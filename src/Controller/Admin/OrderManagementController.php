<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/orders', name: 'admin_orders_')]
class OrderManagementController extends AbstractController
{
    #[Route('/', name: 'list')]
    public function list(): Response
    {
        return $this->render('admin/orders/list.html.twig', [
            'title' => 'Gestion des Commandes'
        ]);
    }

    #[Route('/{id}/detail', name: 'detail')]
    public function detail(int $id): Response
    {
        return $this->render('admin/orders/detail.html.twig', [
            'orderId' => $id,
            'title' => 'Détail Commande'
        ]);
    }
}
