<?php
namespace App\Controller\Traiteur;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\MenuItem;

#[Route('/traiteur')]
class TraiteurController extends AbstractController
{
    #[Route('', name: 'traiteur_dashboard')]
    public function dashboard(EntityManagerInterface $em): Response
    {
        // Load orders from JSON file
        $ordersFile = __DIR__ . '/../../../var/orders.json';
        $allOrders = [];
        $todayRevenue = 0;
        
        if (file_exists($ordersFile)) {
            $content = @file_get_contents($ordersFile);
            $allOrders = json_decode($content ?: '[]', true) ?: [];
            
            // Calculer les revenus du jour pour les commandes servies
            $today = date('Y-m-d');
            foreach ($allOrders as $order) {
                if (isset($order['status']) && $order['status'] === 'delivered') {
                    $orderDate = date('Y-m-d', strtotime($order['createdAt']));
                    if ($orderDate === $today) {
                        foreach ($order['items'] as $item) {
                            $todayRevenue += $item['price'] * $item['quantity'];
                        }
                    }
                }
            }
        }
        
        // Filter only pending orders (status = 'new')
        $pendingOrders = array_filter($allOrders, function($order) {
            return isset($order['status']) && $order['status'] === 'new';
        });
        
        // Compter les produits disponibles
        $productCount = $em->getRepository(MenuItem::class)->count([]);

        return $this->render('traiteur/pages/dashboard.html.twig', [
            'pendingOrders' => $pendingOrders,
            'productCount' => $productCount,
            'todayRevenue' => $todayRevenue,
        ]);
    }

    #[Route('/orders', name: 'traiteur_orders_list')]
    public function orders(): Response
    {
        // Load orders from JSON file
        $ordersFile = __DIR__ . '/../../../var/orders.json';
        $allOrders = [];
        
        if (file_exists($ordersFile)) {
            $content = @file_get_contents($ordersFile);
            $allOrders = json_decode($content ?: '[]', true) ?: [];
        }
        
        return $this->render('traiteur/pages/orders.html.twig', [
            'orders' => $allOrders,
        ]);
    }

    #[Route('/products', name: 'traiteur_products')]
    public function products(EntityManagerInterface $em): Response
    {
        $products = $em->getRepository(MenuItem::class)->findAll();
        
        return $this->render('traiteur/pages/products.html.twig', [
            'products' => $products,
        ]);
    }

    #[Route('/dashboard/products', name: 'traiteur_dashboard_products')]
    public function dashboardProducts(EntityManagerInterface $em): Response
    {
        $products = $em->getRepository(MenuItem::class)->findAll();
        
        return $this->render('traiteur/pages/products.html.twig', [
            'products' => $products,
        ]);
    }

    #[Route('/toggle-product-availability/{id}', name: 'traiteur_toggle_product', methods: ['POST'])]
    public function toggleProductAvailability(MenuItem $product, EntityManagerInterface $em): Response
    {
        $product->setAvailable(!$product->isAvailable());
        $em->flush();
        
        $this->addFlash('success', 'Disponibilité du produit mise à jour.');
        return $this->redirectToRoute('traiteur_dashboard_products');
    }

    #[Route('/update-order-status', name: 'traiteur_update_order_status', methods: ['POST'])]
    public function updateOrderStatus(Request $request, EntityManagerInterface $em): Response
    {
        $orderId = $request->request->get('order_id');
        $newStatus = $request->request->get('status');
        
        // Validate inputs
        if (empty($orderId) || empty($newStatus)) {
            $this->addFlash('error', 'Données invalides');
            return $this->redirectToRoute('traiteur_orders_list');
        }
        
        // Validate status value
        $allowedStatuses = ['new', 'in_progress', 'preparing', 'ready', 'delivered', 'cancelled'];
        if (!in_array($newStatus, $allowedStatuses)) {
            $this->addFlash('error', 'Statut invalide');
            return $this->redirectToRoute('traiteur_orders_list');
        }
        
        $ordersFile = __DIR__ . '/../../../var/orders.json';
        
        if (file_exists($ordersFile)) {
            $content = @file_get_contents($ordersFile);
            $orders = json_decode($content ?: '[]', true) ?: [];
            
            $orderFound = false;
            // Update the order status
            foreach ($orders as &$order) {
                if (isset($order['id']) && (string)$order['id'] === (string)$orderId) {
                    $orderFound = true;
                    // Check product availability before processing
                    if ($newStatus === 'in_progress') {
                        $unavailableProducts = [];
                        foreach ($order['items'] as $item) {
                            $product = $em->getRepository(MenuItem::class)->find($item['id']);
                            if ($product && !$product->isAvailable()) {
                                $unavailableProducts[] = htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8');
                            }
                        }
                        
                        if (!empty($unavailableProducts)) {
                            $order['status'] = 'cancelled';
                            $order['cancelReason'] = 'Produits indisponibles: ' . implode(', ', $unavailableProducts);
                            $this->addFlash('warning', 'Commande annulée - Produits indisponibles: ' . implode(', ', $unavailableProducts));
                        } else {
                            $order['status'] = $newStatus;
                        }
                    } else {
                        $order['status'] = $newStatus;
                    }
                    break;
                }
            }
            
            if (!$orderFound) {
                $this->addFlash('error', 'Commande introuvable');
                return $this->redirectToRoute('traiteur_orders_list');
            }
            
            // Save back to file with error handling
            if (@file_put_contents($ordersFile, json_encode($orders, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)) === false) {
                $this->addFlash('error', 'Erreur lors de la sauvegarde');
            }
        }
        
        return $this->redirectToRoute('traiteur_orders_list');
    }
}
