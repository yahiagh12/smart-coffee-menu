<?php
namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class LoyaltyController extends AbstractController
{
    #[Route('/admin/loyalty', name: 'admin_loyalty')]
    public function index(): Response
    {
        return $this->render('admin/loyalty/list.html.twig');
    }

    #[Route('/admin/loyalty/list', name: 'admin_loyalty_list')]
    #[Route('/admin_loyalty_list', name: 'admin_loyalty_list_alias')]
    public function list(): Response
    {
        return $this->render('admin/loyalty/list.html.twig');
    }
}
