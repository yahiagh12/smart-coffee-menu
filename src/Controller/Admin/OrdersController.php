<?php
namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class OrdersController extends AbstractController
{
    #[Route('/admin/orders', name: 'admin_orders')]
    public function index(): Response
    {
        return $this->list();
    }

    #[Route('/admin/orders/list', name: 'admin_orders_list')]
    public function list(): Response
    {
        // Load orders from JSON file
        $ordersFile = __DIR__ . '/../../../var/orders.json';
        $orders = [];
        
        if (file_exists($ordersFile)) {
            $content = @file_get_contents($ordersFile);
            $orders = json_decode($content ?: '[]', true) ?: [];
        }
        
        // Sort by date (most recent first)
        usort($orders, function($a, $b) {
            $dateA = isset($a['createdAt']) ? strtotime($a['createdAt']) : 0;
            $dateB = isset($b['createdAt']) ? strtotime($b['createdAt']) : 0;
            return $dateB - $dateA;
        });

        return $this->render('admin/orders/list.html.twig', [
            'orders' => $orders
        ]);
    }

    #[Route('/admin/orders/{id}', name: 'admin_orders_detail')]
    public function detail(int $id): Response
    {
        // Render a simple placeholder detail page. Replace with real implementation as needed.
        return $this->render('admin/orders/detail.html.twig', ['id' => $id]);
    }
}
?>