<?php
namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class SuggestionsController extends AbstractController
{
    #[Route('/admin/suggestions', name: 'admin_suggestions')]
    public function index(): Response
    {
        return $this->render('admin/suggestions/list.html.twig');
    }

    #[Route('/admin/suggestions/list', name: 'admin_suggestions_list')]
    #[Route('/admin_suggestions_list', name: 'admin_suggestions_list_alias')]
    public function list(): Response
    {
        return $this->render('admin/suggestions/list.html.twig');
    }
}
