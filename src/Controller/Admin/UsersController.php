<?php
namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends AbstractController
{
    #[Route('/admin/users', name: 'admin_users')]
    public function index(): Response
    {
        return $this->render('admin/users/list.html.twig');
    }

    #[Route('/admin/users/list', name: 'admin_users_list')]
    public function list(): Response
    {
        return $this->render('admin/users/list.html.twig');
    }

    #[Route('/admin/users/manage', name: 'admin_users_manage')]
    public function manage(): Response
    {
        return $this->render('admin/users/manage.html.twig');
    }
}
