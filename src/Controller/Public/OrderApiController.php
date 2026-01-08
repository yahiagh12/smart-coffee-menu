<?php
namespace App\Controller\Public;

use App\Service\LoyaltyService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Filesystem\Filesystem;
use Doctrine\ORM\EntityManagerInterface;

#[Route('/api')]
class OrderApiController extends AbstractController
{
    private string $storagePath;

    public function __construct(private LoyaltyService $loyaltyService, private EntityManagerInterface $em)
    {
        $this->storagePath = __DIR__ . '/../../../var/orders.json';
    }

    #[Route('/orders', name: 'api_orders', methods: ['GET','POST'])]
    public function orders(Request $request): JsonResponse
    {
        $fs = new Filesystem();
        $orders = [];
        if ($fs->exists($this->storagePath)) {
            $content = @file_get_contents($this->storagePath);
            $orders = json_decode($content ?: '[]', true) ?: [];
        }

        if ($request->isMethod('GET')) {
            return $this->json($orders);
        }

        // Require authentication for placing orders
        if (!$this->getUser()) {
            return $this->json(['error' => 'Authentication required to place orders'], 401);
        }

        $data = json_decode($request->getContent() ?: '{}', true);
        if (empty($data) || empty($data['items'])) {
            return $this->json(['error' => 'Invalid payload'], 400);
        }

        $user = $this->getUser();
        $customer = $user ? (method_exists($user, 'getName') ? $user->getName() : (method_exists($user, 'getUserIdentifier') ? $user->getUserIdentifier() : 'user')) : 'user';
        $userEmail = $user && method_exists($user, 'getEmail') ? $user->getEmail() : null;

        // Validate loyalty points BEFORE creating the order
        try {
            $cashItems = [];
            $pointsToDeduct = 0;

            foreach ($data['items'] as $item) {
                if (isset($item['paymentType']) && $item['paymentType'] === 'points') {
                    // Point-based purchase: deduct points
                    $pointsToDeduct += (int)($item['pointsCost'] ?? 0) * (int)($item['quantity'] ?? 1);
                } else {
                    // Cash purchase: award points
                    $cashItems[] = $item;
                }
            }

            // Check if user has sufficient points for point-based purchases
            if ($pointsToDeduct > 0 && $userEmail) {
                $record = $this->em->getRepository(\App\Entity\LoyaltyPoints::class)->findOneByClientIdentifier($userEmail);
                $currentPoints = $record ? $record->getPoints() : 0;
                if ($currentPoints < $pointsToDeduct) {
                    return $this->json([
                        'error' => 'Insufficient loyalty points',
                        'required' => $pointsToDeduct,
                        'available' => $currentPoints
                    ], 400);
                }
            }
        } catch (\Throwable $e) {
            return $this->json(['error' => 'Could not validate loyalty points', 'detail' => $e->getMessage()], 500);
        }

        $order = [
            'id' => (int) round(microtime(true) * 1000),
            'customer' => $customer,
            'customerEmail' => $userEmail,
            'items' => $data['items'],
            'status' => 'new',
            'createdAt' => (new \DateTime())->format(DATE_ATOM),
        ];

        $orders[] = $order;

        try {
            // ensure var dir exists
            $varDir = dirname($this->storagePath);
            if (!$fs->exists($varDir)) {
                $fs->mkdir($varDir, 0755);
            }
            $fs->dumpFile($this->storagePath, json_encode($orders, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

            // Award loyalty points and handle point-based purchases
            try {
                $cashItemsWithPoints = [];
                $pointsToDeduct = 0;

                foreach ($data['items'] as $item) {
                    if (isset($item['paymentType']) && $item['paymentType'] === 'points') {
                        // Point-based purchase: deduct points
                        $pointsToDeduct += (int)($item['pointsCost'] ?? 0) * (int)($item['quantity'] ?? 1);
                    } else {
                        // Cash purchase: fetch product and add fidelityPoints
                        $product = $this->em->getRepository(\App\Entity\MenuItem::class)->find($item['id']);
                        if ($product && $product->getFidelityPoints() > 0) {
                            $itemWithPoints = $item;
                            $itemWithPoints['fidelityPoints'] = $product->getFidelityPoints();
                            $cashItemsWithPoints[] = $itemWithPoints;
                        }
                    }
                }

                // Award points for cash purchases
                if (!empty($cashItemsWithPoints) && $userEmail) {
                    $this->loyaltyService->awardPointsFromItems($cashItemsWithPoints, $userEmail);
                }

                // Deduct points for point-based purchases
                if ($pointsToDeduct > 0 && $userEmail) {
                    try {
                        $record = $this->em->getRepository(\App\Entity\LoyaltyPoints::class)->findOneByClientIdentifier($userEmail);
                        if ($record) {
                            $record->addPoints(-$pointsToDeduct); // Deduct points (negative number)
                            $this->em->flush();
                        }
                    } catch (\Throwable $e) {
                        error_log('Failed to deduct loyalty points: ' . $e->getMessage());
                    }
                }
            } catch (\Throwable $e) {
                // Log but don't fail the order if loyalty points can't be awarded
                error_log('Failed to process loyalty points: ' . $e->getMessage());
            }
        } catch (\Throwable $e) {
            return $this->json(['error' => 'Could not save order', 'detail' => $e->getMessage()], 500);
        }

        return $this->json(['success' => true, 'order' => $order], 201);
    }

    #[Route('/orders/{id}/status', name: 'api_orders_status', methods: ['POST'])]
    public function updateStatus(Request $request, string $id): JsonResponse
    {
        $fs = new Filesystem();
        $orders = [];
        if ($fs->exists($this->storagePath)) {
            $content = @file_get_contents($this->storagePath);
            $orders = json_decode($content ?: '[]', true) ?: [];
        }

        $data = json_decode($request->getContent() ?: '{}', true);
        $newStatus = $data['status'] ?? 'ready';

        $changed = false;
        foreach ($orders as &$o) {
            if ((string)$o['id'] === (string)$id) {
                $o['status'] = $newStatus;
                $changed = true;
                break;
            }
        }

        if (!$changed) {
            return $this->json(['error' => 'Order not found'], 404);
        }

        try {
            $fs->dumpFile($this->storagePath, json_encode($orders, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        } catch (\Throwable $e) {
            return $this->json(['error' => 'Could not update order', 'detail' => $e->getMessage()], 500);
        }

        return $this->json(['success' => true]);
    }

    #[Route('/menu', name: 'api_menu', methods: ['GET'])]
    public function menu(): JsonResponse
    {
        try {
            $menuItems = $this->em->getRepository(\App\Entity\MenuItem::class)->findBy(['available' => true]);
            
            $items = array_map(function($item) {
                return [
                    'id' => $item->getId(),
                    'name' => $item->getName(),
                    'price' => $item->getPrice(),
                    'description' => $item->getDescription(),
                    'image' => $item->getImage(),
                    'fidelityPoints' => $item->getFidelityPoints(),
                    'category' => $item->getCategorie() ? $item->getCategorie()->getName() : null,
                ];
            }, $menuItems);

            return $this->json(['items' => $items]);
        } catch (\Throwable $e) {
            return $this->json(['error' => 'Could not fetch menu', 'detail' => $e->getMessage()], 500);
        }
    }
}
