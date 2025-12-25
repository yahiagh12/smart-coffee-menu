<?php
namespace App\Controller\Public;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    public function index(): Response
    {
        // Redirect root to login page
        return $this->redirectToRoute('app_login');
    }
}
    