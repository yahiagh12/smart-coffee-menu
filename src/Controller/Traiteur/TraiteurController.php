<?php
namespace App\Controller\Traiteur;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/traiteur')]
class TraiteurController extends AbstractController
{
    #[Route('', name: 'traiteur_dashboard')]
    public function dashboard(): Response
    {
        // Provide safe defaults so the template doesn't fail when previewing
        // — templates expect `pendingOrders` and `products`.
        $defaults = [
            'pendingOrders' => [],
            'products' => [],
        ];

        return $this->render('traiteur/pages/dashboard.html.twig', $defaults);
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
}
