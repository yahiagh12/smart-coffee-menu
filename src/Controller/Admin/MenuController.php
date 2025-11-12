<?php

namespace App\Controller\Admin;

use App\Entity\MenuItem;
use App\Form\MenuItemType;
use App\Repository\MenuItemRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/menu')]
class MenuController extends AbstractController
{
    private MenuItemRepository $menuItemRepository;

    public function __construct(MenuItemRepository $menuItemRepository)
    {
        $this->menuItemRepository = $menuItemRepository;
    }

    #[Route('/', name: 'admin_menu_index')]
    public function index(): Response
    {
        // Show ALL items to admin (both available and unavailable)
        $menuItems = $this->menuItemRepository->findAll();

        return $this->render('admin/menu/index.html.twig', [
            'menuItems' => $menuItems,
        ]);
    }

    #[Route('/new', name: 'admin_menu_new')]
    public function new(Request $request): Response
    {
        $menuItem = new MenuItem();
        $form = $this->createForm(MenuItemType::class, $menuItem);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('imageFile')->getData();
            
            if ($imageFile) {
                $newFilename = uniqid().'.'.$imageFile->guessExtension();
                
                try {
                    $imageFile->move(
                        $this->getParameter('kernel.project_dir').'/public/uploads/menu',
                        $newFilename
                    );
                    $menuItem->setImage('/uploads/menu/'.$newFilename);
                } catch (FileException $e) {
                    $this->addFlash('error', 'Failed to upload image.');
                }
            }

            $this->menuItemRepository->save($menuItem, true);
            $this->addFlash('success', 'Menu item added successfully!');

            return $this->redirectToRoute('admin_menu_index');
        }

        return $this->render('admin/menu/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/edit/{id}', name: 'admin_menu_edit')]
    public function edit(Request $request, int $id): Response
    {
        $menuItem = $this->menuItemRepository->find($id);

        if (!$menuItem) {
            $this->addFlash('error', 'Menu item not found');
            return $this->redirectToRoute('admin_menu_index');
        }

        $form = $this->createForm(MenuItemType::class, $menuItem);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('imageFile')->getData();
            
            if ($imageFile) {
                $newFilename = uniqid().'.'.$imageFile->guessExtension();
                
                try {
                    $imageFile->move(
                        $this->getParameter('kernel.project_dir').'/public/uploads/menu',
                        $newFilename
                    );
                    $menuItem->setImage('/uploads/menu/'.$newFilename);
                } catch (FileException $e) {
                    $this->addFlash('error', 'Failed to upload image.');
                }
            }

            $this->menuItemRepository->save($menuItem, true);
            $this->addFlash('success', 'Menu item updated successfully!');

            return $this->redirectToRoute('admin_menu_index');
        }

        return $this->render('admin/menu/edit.html.twig', [
            'form' => $form->createView(),
            'menuItem' => $menuItem,
        ]);
    }

    #[Route('/delete/{id}', name: 'admin_menu_delete')]
    public function delete(int $id): Response
    {
        $item = $this->menuItemRepository->find($id);

        if (!$item) {
            $this->addFlash('error', 'Item not found');
            return $this->redirectToRoute('admin_menu_index');
        }

        $this->menuItemRepository->remove($item, true);
        $this->addFlash('success', 'Menu item deleted successfully!');

        return $this->redirectToRoute('admin_menu_index');
    }
}