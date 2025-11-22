<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class CafeController extends AbstractController
{
    #[Route('/cafe_virtuel', name: 'cafe_virtuel')]
    public function show(): Response
    {
        return $this->render('cafe_virtuel.html.twig');
    }
}
