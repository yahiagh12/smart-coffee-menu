<?php
namespace App\Controller\Admin;

use App\Entity\Categorie;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/categories')]
class CategorieController extends AbstractController
{
    public function __construct(
        private EntityManagerInterface $em
    ) {
    }

    #[Route('', name: 'admin_categories_list')]
    public function list(): Response
    {
        $categories = $this->em->getRepository(Categorie::class)->findAll();
        
        return $this->render('admin/menu/categories.html.twig', [
            'categories' => $categories
        ]);
    }

    #[Route('/create', name: 'admin_categories_create', methods: ['POST'])]
    public function create(Request $request): Response
    {
        $name = $request->request->get('name');

        if (empty($name)) {
            $this->addFlash('error', 'Le nom est requis');
            return $this->redirectToRoute('admin_categories_list');
        }

        $categorie = new Categorie($name);
        $this->em->persist($categorie);
        $this->em->flush();

        $this->addFlash('success', 'Catégorie créée avec succès');
        return $this->redirectToRoute('admin_categories_list');
    }

    #[Route('/{id}/edit', name: 'admin_categories_update', methods: ['POST'])]
    public function update(int $id, Request $request): Response
    {
        $categorie = $this->em->getRepository(Categorie::class)->find($id);
        if (!$categorie) {
            $this->addFlash('error', 'Catégorie introuvable');
            return $this->redirectToRoute('admin_categories_list');
        }

        $name = $request->request->get('name');
        if ($name) {
            $categorie->setName($name);
            $this->em->flush();
            $this->addFlash('success', 'Catégorie modifiée avec succès');
        }

        return $this->redirectToRoute('admin_categories_list');
    }

    #[Route('/{id}/delete', name: 'admin_categories_delete', methods: ['POST'])]
    public function delete(int $id): Response
    {
        $categorie = $this->em->getRepository(Categorie::class)->find($id);
        if ($categorie) {
            $this->em->remove($categorie);
            $this->em->flush();
            $this->addFlash('success', 'Catégorie supprimée');
        }

        return $this->redirectToRoute('admin_categories_list');
    }
}
