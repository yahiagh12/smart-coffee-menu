<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/menu', name: 'admin_menu_')]
class MenuManagementController extends AbstractController
{
    #[Route('/', name: 'list')]
    public function list(): Response
    {
        return $this->render('admin/menu/list.html.twig', [
            'title' => 'Gestion du Menu'
        ]);
    }

    #[Route('/create', name: 'create')]
    public function create(): Response
    {
        return $this->render('admin/menu/form.html.twig', [
            'title' => 'Ajouter un Produit'
        ]);
    }

    #[Route('/{id}/edit', name: 'edit')]
    public function edit(Product $product): Response
    {
        return $this->render('admin/menu/form.html.twig', [
            'product' => $product,
            'title' => 'Éditer Produit'
        ]);
    }

    #[Route('/{id}/delete', name: 'delete', methods: ['POST'])]
    public function delete(Product $product, Request $request): Response
    {
        if ($this->isCsrfTokenValid('delete' . $product->getId(), $request->request->get('_token'))) {
            // Delete product logic here
        }

        return $this->redirectToRoute('admin_menu_list');
    }

    #[Route('/categories', name: 'categories')]
    public function categories(): Response
    {
        return $this->render('admin/menu/categories.html.twig', [
            'title' => 'Gestion des Catégories'
        ]);
    }
}
