<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(TokenStorageInterface $tokenStorage): Response
    {
        $token = $tokenStorage->getToken();
        $user = $token ? $token->getUser() : null;

        // Redirect to login if not authenticated
        if (!$user || $user === 'anon.' || (is_object($user) && method_exists($user, 'getRoles') && empty($user->getRoles()))) {
            return $this->redirect('/auth/login');
        }

        // Redirect based on user type
        if (is_object($user) && method_exists($user, 'getType')) {
            switch ($user->getType()) {
                case 'admin':
                    return $this->redirectToRoute('admin_dashboard');
                case 'traiteur':
                    return $this->redirectToRoute('traiteur_dashboard');
                case 'client':
                    return $this->redirectToRoute('client_dashboard');
                default:
                    return $this->redirect('/auth/login');
            }
        }
        return $this->redirect('/auth/login');
    }
}
