<?php

namespace App\Controller;

use App\Repository\MenuItemRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClientMenuController extends AbstractController
{
    private MenuItemRepository $menuItemRepository;

    public function __construct(MenuItemRepository $menuItemRepository)
    {
        $this->menuItemRepository = $menuItemRepository;
    }

    #[Route('/menu', name: 'menu_list')]
    public function list(): Response
    {
        // Only show available items to customers
        $menuItems = $this->menuItemRepository->findAvailable();

        return $this->render('menu/index.html.twig', [
            'menuItems' => $menuItems,
        ]);
    }

    #[Route('/menu/category/{category}', name: 'menu_by_category')]
    public function byCategory(string $category): Response
    {
        $menuItems = $this->menuItemRepository->findBy([
            'category' => $category,
            'available' => true
        ]);

        return $this->render('menu/category.html.twig', [
            'menuItems' => $menuItems,
            'category' => $category,
        ]);
    }

    #[Route('/menu/item/{id}', name: 'menu_item_detail')]
    public function detail(int $id): Response
    {
        $menuItem = $this->menuItemRepository->find($id);

        if (!$menuItem || !$menuItem->isAvailable()) {
            throw $this->createNotFoundException('Menu item not found');
        }

        return $this->render('menu/detail.html.twig', [
            'menuItem' => $menuItem,
        ]);
    }
}