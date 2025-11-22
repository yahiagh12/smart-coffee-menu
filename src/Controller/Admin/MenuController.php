<?php
namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class MenuController extends AbstractController
{
    #[Route('/admin/menu', name: 'admin_menu')]
    public function index(): Response
    {
        return $this->render('admin/menu/list.html.twig');
    }

    #[Route('/admin/menu/list', name: 'admin_menu_list')]
    public function list(): Response
    {
        return $this->render('admin/menu/list.html.twig');
    }

    #[Route('/admin/menu/categories', name: 'admin_menu_categories')]
    public function categories(): Response
    {
        return $this->render('admin/menu/categories.html.twig');
    }
}