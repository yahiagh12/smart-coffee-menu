<?php
namespace App\Controller\Admin;

use App\Entity\MenuItem;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class SuggestionsController extends AbstractController
{
    public function __construct(
        private EntityManagerInterface $em
    ) {
    }

    #[Route('/admin/suggestions', name: 'admin_suggestions')]
    public function index(): Response
    {
        $menuItems = $this->em->getRepository(MenuItem::class)->findAll();
        
        // Convert to arrays for JSON encoding
        $menuArray = array_map(fn($m) => [
            'id' => $m->getId(),
            'name' => $m->getName(),
            'category' => $m->getCategorie() ? $m->getCategorie()->getName() : '',
            'price' => $m->getPrice(),
            'description' => $m->getDescription(),
            'image' => $m->getImage(),
        ], $menuItems);

        return $this->render('admin/suggestions/list.html.twig', [
            'menuItems' => $menuArray
        ]);
    }

    #[Route('/admin/suggestions/list', name: 'admin_suggestions_list')]
    #[Route('/admin_suggestions_list', name: 'admin_suggestions_list_alias')]
    public function list(): Response
    {
        return $this->redirectToRoute('admin_suggestions');
    }
}
