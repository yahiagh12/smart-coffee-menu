<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CafeVirtuelController extends AbstractController
{
    #[Route('/cafe', name: 'app_cafe_home')]
    #[Route('/menu', name: 'app_menu')]
    public function index(): Response
    {
        // Check if user is logged in via session
        $userId = $this->getRequest()->getSession()->get('user_id');
        
        if (!$userId) {
            return $this->redirectToRoute('app_login');
        }

        return $this->render('cafe_virtuel_client.html.twig');
    }

    #[Route('/cafe-old', name: 'app_cafe_virtuel')]
    public function cafe(): Response
    {
        $userId = $this->getRequest()->getSession()->get('user_id');
        
        if (!$userId) {
            return $this->redirectToRoute('app_login');
        }

        return $this->render('cafe_virtuel_client.html.twig');
    }

    private function getRequest()
    {
        return $this->container->get('request_stack')->getCurrentRequest();
    }
}
