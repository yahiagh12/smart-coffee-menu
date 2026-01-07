<?php
namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\User;
use App\Entity\MenuItem;
use App\Entity\Categorie;
use App\Entity\Event;
use App\Entity\EventRequest;
use App\Entity\LoyaltyPoints;

class DashboardController extends AbstractController
{
    #[Route('/admin', name: 'admin_dashboard')]
    public function dashboard(EntityManagerInterface $em): Response
    {
        // Compter les utilisateurs
        $userCount = $em->getRepository(User::class)->count([]);
        
        // Compter les utilisateurs par role
        $adminCount = count($em->getRepository(User::class)->findByRole(User::ROLE_ADMIN));
        $clientCount = count($em->getRepository(User::class)->findByRole(User::ROLE_CLIENT));
        $traiteurCount = count($em->getRepository(User::class)->findByRole(User::ROLE_TRAITEUR));
        
        // Compter les produits
        $productCount = $em->getRepository(MenuItem::class)->count([]);
        
        // Compter les catégories
        $categoryCount = $em->getRepository(Categorie::class)->count([]);
        
        // Compter les événements
        $eventCount = $em->getRepository(Event::class)->count([]);
        $activeEvents = $em->getRepository(Event::class)->count(['status' => 'published']);
        
        // Compter les demandes d'événements
        $eventRequestCount = $em->getRepository(EventRequest::class)->count([]);
        
        // Statistiques de fidélité
        $loyaltyStats = $em->createQueryBuilder()
            ->select('SUM(lp.points) as totalPoints, COUNT(lp.id) as activeClients')
            ->from(LoyaltyPoints::class, 'lp')
            ->where('lp.points > 0')
            ->getQuery()
            ->getSingleResult();
        
        $totalLoyaltyPoints = $loyaltyStats['totalPoints'] ?? 0;
        $activeLoyaltyClients = $loyaltyStats['activeClients'] ?? 0;
        
        // Top 5 clients fidèles
        $topLoyaltyClients = $em->createQueryBuilder()
            ->select('lp')
            ->from(LoyaltyPoints::class, 'lp')
            ->orderBy('lp.points', 'DESC')
            ->setMaxResults(5)
            ->getQuery()
            ->getResult();
        
        // Récents utilisateurs
        $recentUsers = $em->getRepository(User::class)->findBy(
            [],
            ['createdAt' => 'DESC'],
            5
        );
        
        // Charger les commandes depuis le fichier JSON
        $ordersFile = $this->getParameter('kernel.project_dir') . '/var/orders.json';
        $orders = [];
        $totalRevenue = 0;
        $pendingOrders = 0;
        $deliveredOrders = 0;
        $preparingOrders = 0;
        $readyOrders = 0;
        $cancelledOrders = 0;
        $productStats = [];
        
        if (file_exists($ordersFile)) {
            $ordersData = json_decode(file_get_contents($ordersFile), true);
            $orders = $ordersData ?? [];
            
            // Calculer les statistiques de commandes et produits
            foreach ($orders as $order) {
                if (isset($order['status'])) {
                    // Compter par statut
                    switch ($order['status']) {
                        case 'new':
                            $pendingOrders++;
                            break;
                        case 'in_progress':
                        case 'preparing':
                            $preparingOrders++;
                            break;
                        case 'ready':
                            $readyOrders++;
                            break;
                        case 'delivered':
                            $deliveredOrders++;
                            break;
                        case 'cancelled':
                            $cancelledOrders++;
                            break;
                    }
                    
                    if ($order['status'] === 'delivered') {
                        foreach ($order['items'] as $item) {
                            $totalRevenue += $item['price'] * $item['quantity'];
                            
                            // Compter les produits commandés
                            $productId = $item['id'] ?? $item['name'];
                            if (!isset($productStats[$productId])) {
                                $productStats[$productId] = [
                                    'id' => $item['id'] ?? null,
                                    'name' => $item['name'],
                                    'totalQuantity' => 0,
                                    'totalRevenue' => 0,
                                    'orderCount' => 0,
                                    'image' => $item['image'] ?? null
                                ];
                            }
                            $productStats[$productId]['totalQuantity'] += $item['quantity'];
                            $productStats[$productId]['totalRevenue'] += $item['price'] * $item['quantity'];
                            $productStats[$productId]['orderCount']++;
                        }
                    }
                }
            }
        }
        
        // Trier les produits par quantité totale (les plus commandés)
        usort($productStats, function($a, $b) {
            return $b['totalQuantity'] - $a['totalQuantity'];
        });
        $topProducts = array_slice($productStats, 0, 5);
        
        // Produits les plus rentables
        $topRevenueProducts = $productStats;
        usort($topRevenueProducts, function($a, $b) {
            return $b['totalRevenue'] <=> $a['totalRevenue'];
        });
        $topRevenueProducts = array_slice($topRevenueProducts, 0, 5);
        
        // Statistiques de catégories avec produits
        $categoryStats = $em->createQueryBuilder()
            ->select('c.name, COUNT(m.id) as productCount')
            ->from(Categorie::class, 'c')
            ->leftJoin('c.menuItems', 'm')
            ->groupBy('c.id')
            ->orderBy('productCount', 'DESC')
            ->setMaxResults(5)
            ->getQuery()
            ->getResult();
        
        return $this->render('admin/pages/dashboard.html.twig', [
            // Compteurs généraux
            'userCount' => $userCount,
            'adminCount' => $adminCount,
            'clientCount' => $clientCount,
            'traiteurCount' => $traiteurCount,
            'productCount' => $productCount,
            'categoryCount' => $categoryCount,
            'eventCount' => $eventCount,
            'activeEvents' => $activeEvents,
            'eventRequestCount' => $eventRequestCount,
            
            // Statistiques de commandes
            'orderCount' => count($orders),
            'pendingOrders' => $pendingOrders,
            'preparingOrders' => $preparingOrders,
            'readyOrders' => $readyOrders,
            'deliveredOrders' => $deliveredOrders,
            'cancelledOrders' => $cancelledOrders,
            'totalRevenue' => $totalRevenue,
            'recentOrders' => array_slice(array_reverse($orders), 0, 5),
            
            // Statistiques de fidélité
            'totalLoyaltyPoints' => $totalLoyaltyPoints,
            'activeLoyaltyClients' => $activeLoyaltyClients,
            'topLoyaltyClients' => $topLoyaltyClients,
            
            // Données récentes
            'recentUsers' => $recentUsers,
            'categoryStats' => $categoryStats,
            
            // Statistiques de produits
            'topProducts' => $topProducts,
            'topRevenueProducts' => $topRevenueProducts,
        ]);
    }
}