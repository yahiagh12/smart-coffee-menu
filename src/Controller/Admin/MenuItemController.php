<?php
namespace App\Controller\Admin;

use App\Entity\MenuItem;
use App\Entity\Categorie;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\UploadedFile;

#[Route('/admin/menu')]
class MenuItemController extends AbstractController
{
    public function __construct(
        private EntityManagerInterface $em
    ) {
    }

    #[Route('/items', name: 'admin_menu_items_list')]
    public function list(): Response
    {
        $items = $this->em->getRepository(MenuItem::class)->findAll();
        $categories = $this->em->getRepository(Categorie::class)->findAll();
        
        return $this->render('admin/menu/list.html.twig', [
            'items' => $items,
            'categories' => $categories
        ]);
    }

    #[Route('/items/create', name: 'admin_menu_items_create', methods: ['POST'])]
    public function create(Request $request): Response
    {
        $name = $request->request->get('name');
        $price = $request->request->get('price');
        $description = $request->request->get('description');
        $categorieId = $request->request->get('categorie');
        $fidelityPoints = $request->request->get('fidelityPoints', 0);

        if (empty($name)) {
            $this->addFlash('error', 'Le nom est requis');
            return $this->redirectToRoute('admin_menu_items_list');
        }

        $item = new MenuItem();
        $item->setName($name);
        $item->setPrice((float)$price);
        $item->setDescription($description);
        $item->setFidelityPoints((int)$fidelityPoints);

        if ($categorieId) {
            $categorie = $this->em->getRepository(Categorie::class)->find($categorieId);
            if ($categorie) {
                $item->setCategorie($categorie);
            }
        }

        // Handle image upload
        /** @var UploadedFile $file */
        $file = $request->files->get('image');
        if ($file && $file->isValid()) {
            $content = file_get_contents($file->getPathname());
            $dataUri = 'data:' . $file->getClientMimeType() . ';base64,' . base64_encode($content);
            $item->setImage($dataUri);
        }

        $this->em->persist($item);
        $this->em->flush();

        $this->addFlash('success', 'Produit créé avec succès');
        return $this->redirectToRoute('admin_menu_items_list');
    }

    #[Route('/items/{id}/edit', name: 'admin_menu_items_update', methods: ['POST'])]
    public function update(int $id, Request $request): Response
    {
        $item = $this->em->getRepository(MenuItem::class)->find($id);
        if (!$item) {
            $this->addFlash('error', 'Produit introuvable');
            return $this->redirectToRoute('admin_menu_items_list');
        }

        $name = $request->request->get('name');
        $price = $request->request->get('price');
        $description = $request->request->get('description');
        $categorieId = $request->request->get('categorie');
        $fidelityPoints = $request->request->get('fidelityPoints', 0);

        if ($name) $item->setName($name);
        if ($price !== null) $item->setPrice((float)$price);
        if ($description !== null) $item->setDescription($description);
        if ($fidelityPoints !== null) $item->setFidelityPoints((int)$fidelityPoints);

        if ($categorieId) {
            $categorie = $this->em->getRepository(Categorie::class)->find($categorieId);
            if ($categorie) {
                $item->setCategorie($categorie);
            }
        }

        // Handle image upload
        /** @var UploadedFile $file */
        $file = $request->files->get('image');
        if ($file && $file->isValid()) {
            $content = file_get_contents($file->getPathname());
            $dataUri = 'data:' . $file->getClientMimeType() . ';base64,' . base64_encode($content);
            $item->setImage($dataUri);
        }

        $this->em->flush();

        $this->addFlash('success', 'Produit modifié avec succès');
        return $this->redirectToRoute('admin_menu_items_list');
    }

    #[Route('/items/{id}/delete', name: 'admin_menu_items_delete', methods: ['POST'])]
    public function delete(int $id): Response
    {
        $item = $this->em->getRepository(MenuItem::class)->find($id);
        if ($item) {
            $this->em->remove($item);
            $this->em->flush();
            $this->addFlash('success', 'Produit supprimé');
        }

        return $this->redirectToRoute('admin_menu_items_list');
    }
}
