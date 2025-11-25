<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class ClientController extends AbstractController
{
    #[Route('/client', name: 'client_home')]
    public function index(): Response
    {
        return $this->render('client/account.html.twig');
    }
}
