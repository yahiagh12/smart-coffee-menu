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
        return $this->render('admin/orders/list.html.twig');
    }

    #[Route('/admin/orders/list', name: 'admin_orders_list')]
    public function list(): Response
    {
        return $this->render('admin/orders/list.html.twig');
    }

    #[Route('/admin/orders/{id}', name: 'admin_orders_detail')]
    public function detail(int $id): Response
    {
        // Render a simple placeholder detail page. Replace with real implementation as needed.
        return $this->render('admin/orders/detail.html.twig', ['id' => $id]);
    }
}
?>