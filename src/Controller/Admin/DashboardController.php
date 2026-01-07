<?php
namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\User;
use App\Entity\MenuItem;

class DashboardController extends AbstractController
{
    #[Route('/admin', name: 'admin_dashboard')]
    public function dashboard(EntityManagerInterface $em): Response
    {
        // Compter les utilisateurs
        $userCount = $em->getRepository(User::class)->count([]);
        
        // Compter les produits
        $productCount = $em->getRepository(MenuItem::class)->count([]);
        
        // Charger les commandes depuis le fichier JSON
        $ordersFile = $this->getParameter('kernel.project_dir') . '/var/orders.json';
        $orders = [];
        $totalRevenue = 0;
        
        if (file_exists($ordersFile)) {
            $ordersData = json_decode(file_get_contents($ordersFile), true);
            $orders = $ordersData ?? [];
            
            // Calculer le revenu total uniquement pour les commandes servies (delivered)
            foreach ($orders as $order) {
                if (isset($order['status']) && $order['status'] === 'delivered') {
                    foreach ($order['items'] as $item) {
                        $totalRevenue += $item['price'] * $item['quantity'];
                    }
                }
            }
        }
        
        return $this->render('admin/pages/dashboard.html.twig', [
            'userCount' => $userCount,
            'productCount' => $productCount,
            'orderCount' => count($orders),
            'totalRevenue' => $totalRevenue,
            'recentOrders' => array_slice(array_reverse($orders), 0, 5)
        ]);
    }
}