<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TraiteurDashboardController extends AbstractController
{
    /**
     * @Route("/traiteur/dashboard", name="traiteur_dashboard")
     */
    public function index(): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $user = $this->getUser();
        if (!$user || $user->getType() !== 'traiteur') {
            return $this->redirectToRoute('login');
        }
        return $this->render('traiteur/dashboard.html.twig');
    }
}
