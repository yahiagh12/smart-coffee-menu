<?php
namespace App\Controller\Auth;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;

class LogoutController extends AbstractController
{
    #[Route('/auth_logout', name: 'app_logout')]
    public function logout(Request $request): Response
    {
        // Invalidate session
        $session = $request->getSession();
        if ($session) {
            $session->invalidate();
        }

        // Clear localStorage client-side is handled by the link's onclick in the template.

        // Redirect to login page
        return new RedirectResponse($this->generateUrl('app_login'));
    }
}
