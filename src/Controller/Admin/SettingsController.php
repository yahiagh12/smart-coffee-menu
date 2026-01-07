<?php
namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class SettingsController extends AbstractController
{
    #[Route('/admin/settings', name: 'admin_settings')]
    public function index(): Response
    {
        return $this->render('admin/settings/index.html.twig');
    }
}
