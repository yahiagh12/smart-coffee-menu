<?php
namespace App\Controller\Auth;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends AbstractController
{
    #[Route('/login', name: 'app_login')]
    public function login(): Response
    {
        // Provide safe defaults so template renders in dev without form submission
        $defaults = [
            'success' => null,
            'error' => null,
        ];

        return $this->render('auth/pages/login.html.twig', $defaults);
    }
}
