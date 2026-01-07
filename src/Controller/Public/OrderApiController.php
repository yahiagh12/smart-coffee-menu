<?php
namespace App\Controller\Public;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Filesystem\Filesystem;

#[Route('/api')]
class OrderApiController extends AbstractController
{
    private string $storagePath;

    public function __construct()
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

        $data = json_decode($request->getContent() ?: '{}', true);
        if (empty($data) || empty($data['items'])) {
            return $this->json(['error' => 'Invalid payload'], 400);
        }

        $user = $this->getUser();
        $customer = $user ? (method_exists($user, 'getName') ? $user->getName() : (method_exists($user, 'getUserIdentifier') ? $user->getUserIdentifier() : 'user')) : ($data['customer'] ?? 'guest');

        $order = [
            'id' => (int) round(microtime(true) * 1000),
            'customer' => $customer,
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
}
