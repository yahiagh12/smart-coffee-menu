<?php
namespace App\Controller\Traiteur;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
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
        return $this->render('traiteur/pages/orders.html.twig', []);
    }

    #[Route('/products', name: 'traiteur_products')]
    public function products(): Response
    {
        return $this->render('traiteur/pages/products.html.twig', []);
    }

    #[Route('/dashboard/products', name: 'traiteur_dashboard_products')]
    public function dashboardProducts(): Response
    {
        return $this->render('traiteur/pages/products.html.twig', []);
    }

    #[Route('/update-order-status', name: 'traiteur_update_order_status', methods: ['POST'])]
    public function updateOrderStatus(\Symfony\Component\HttpFoundation\Request $request): Response
    {
        $orderId = $request->request->get('order_id');
        $newStatus = $request->request->get('status');
        
        $ordersFile = __DIR__ . '/../../../var/orders.json';
        
        if (file_exists($ordersFile)) {
            $content = @file_get_contents($ordersFile);
            $orders = json_decode($content ?: '[]', true) ?: [];
            
            // Update the order status
            foreach ($orders as &$order) {
                if (isset($order['id']) && (string)$order['id'] === (string)$orderId) {
                    $order['status'] = $newStatus;
                    break;
                }
            }
            
            // Save back to file
            file_put_contents($ordersFile, json_encode($orders, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        }
        
        return $this->redirectToRoute('traiteur_dashboard');
    }
}
