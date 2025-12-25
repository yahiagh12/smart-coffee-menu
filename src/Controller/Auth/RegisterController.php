<?php
namespace App\Controller\Auth;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class RegisterController extends AbstractController
{
    #[Route('/register', name: 'app_register')]
    public function register(): Response
    {
        // Provide safe defaults for templates that expect these variables
        $defaults = [
            'errors' => [],
            'formData' => [],
        ];

        return $this->render('auth/pages/register.html.twig', $defaults);
    }
}
