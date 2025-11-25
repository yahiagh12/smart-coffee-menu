<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Exception\BadCredentialsException;

class SecurityController extends AbstractController
{
    #[Route(path: '/auth/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        // convert the exception into a friendly message for the template
        $errorMessage = null;
        if ($error) {
            if ($error instanceof BadCredentialsException) {
                $errorMessage = 'Identifiants invalides.';
            } else {
                // fallback to the exception message (already translated by Symfony in many cases)
                $errorMessage = (string) $error->getMessage();
            }
        }

        return $this->render('auth/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $errorMessage,
        ]);
    }

    #[Route(path: '/auth/logout', name: 'app_logout')]
    public function logout(): void
    {
        // controller can be blank: it will be intercepted by the logout key on your firewall
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
