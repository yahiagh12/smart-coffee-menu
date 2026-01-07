<?php
namespace App\Controller\Admin;

use App\Entity\MenuItem;
use App\Entity\Categorie;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class MenuController extends AbstractController
{
    public function __construct(
        private EntityManagerInterface $em
    ) {
    }

    #[Route('/admin/menu', name: 'admin_menu')]
    public function index(): Response
    {
        $items = $this->em->getRepository(MenuItem::class)->findAll();
        $categories = $this->em->getRepository(Categorie::class)->findAll();
        
        return $this->render('admin/menu/list.html.twig', [
            'items' => $items,
            'categories' => $categories
        ]);
    }

    #[Route('/admin/menu/list', name: 'admin_menu_list')]
    public function list(): Response
    {
        $items = $this->em->getRepository(MenuItem::class)->findAll();
        $categories = $this->em->getRepository(Categorie::class)->findAll();
        
        return $this->render('admin/menu/list.html.twig', [
            'items' => $items,
            'categories' => $categories
        ]);
    }

    #[Route('/admin/menu/categories', name: 'admin_menu_categories')]
    public function categories(): Response
    {
        $categories = $this->em->getRepository(Categorie::class)->findAll();
        
        return $this->render('admin/menu/categories.html.twig', [
            'categories' => $categories
        ]);
    }
}