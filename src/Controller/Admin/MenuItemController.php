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
        // CSRF token validation is handled by Symfony security
        
        $name = trim($request->request->get('name', ''));
        $price = $request->request->get('price', 0);
        $description = trim($request->request->get('description', ''));
        $categorieId = $request->request->get('categorie');
        $fidelityPoints = $request->request->get('fidelityPoints', 0);
        $pointsRedeemPrice = $request->request->get('pointsRedeemPrice', 0);
        $available = $request->request->get('available') === '1';

        // Validate inputs
        if (empty($name) || strlen($name) > 255) {
            $this->addFlash('error', 'Le nom est requis et ne doit pas dépasser 255 caractères');
            return $this->redirectToRoute('admin_menu_items_list');
        }
        
        if (!is_numeric($price) || $price < 0 || $price > 999999) {
            $this->addFlash('error', 'Le prix doit être un nombre valide entre 0 et 999999');
            return $this->redirectToRoute('admin_menu_items_list');
        }
        
        if (!is_numeric($fidelityPoints) || $fidelityPoints < 0 || $fidelityPoints > 10000) {
            $this->addFlash('error', 'Les points de fidélité doivent être entre 0 et 10000');
            return $this->redirectToRoute('admin_menu_items_list');
        }
        
        if (!is_numeric($pointsRedeemPrice) || $pointsRedeemPrice < 0 || $pointsRedeemPrice > 100000) {
            $this->addFlash('error', 'Le prix de rachat doit être entre 0 et 100000 points');
            return $this->redirectToRoute('admin_menu_items_list');
        }
        
        // Sanitize HTML from description
        $description = strip_tags($description);

        $item = new MenuItem();
        $item->setName(htmlspecialchars($name, ENT_QUOTES, 'UTF-8'));
        $item->setPrice((float)$price);
        $item->setDescription($description);
        $item->setFidelityPoints((int)$fidelityPoints);
        $item->setPointsRedeemPrice((int)$pointsRedeemPrice);
        $item->setAvailable($available);

        if ($categorieId) {
            $categorie = $this->em->getRepository(Categorie::class)->find($categorieId);
            if ($categorie) {
                $item->setCategorie($categorie);
            }
        }

        // Handle image upload with security checks
        /** @var UploadedFile $file */
        $file = $request->files->get('image');
        if ($file && $file->isValid()) {
            // Validate file type
            $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
            if (!in_array($file->getClientMimeType(), $allowedMimeTypes)) {
                $this->addFlash('error', 'Format d\'image non autorisé. Utilisez JPG, PNG, GIF ou WebP.');
                return $this->redirectToRoute('admin_menu_items_list');
            }
            
            // Validate file size (max 5MB)
            if ($file->getSize() > 5 * 1024 * 1024) {
                $this->addFlash('error', 'L\'image ne doit pas dépasser 5 MB.');
                return $this->redirectToRoute('admin_menu_items_list');
            }
            
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

        $name = trim($request->request->get('name', ''));
        $price = $request->request->get('price');
        $description = trim($request->request->get('description', ''));
        $categorieId = $request->request->get('categorie');
        $fidelityPoints = $request->request->get('fidelityPoints', 0);
        $pointsRedeemPrice = $request->request->get('pointsRedeemPrice', 0);
        $available = $request->request->get('available') === '1';

        // Validate inputs
        if (!empty($name)) {
            if (strlen($name) > 255) {
                $this->addFlash('error', 'Le nom ne doit pas dépasser 255 caractères');
                return $this->redirectToRoute('admin_menu_items_list');
            }
            $item->setName(htmlspecialchars($name, ENT_QUOTES, 'UTF-8'));
        }
        
        if ($price !== null) {
            if (!is_numeric($price) || $price < 0 || $price > 999999) {
                $this->addFlash('error', 'Le prix doit être un nombre valide');
                return $this->redirectToRoute('admin_menu_items_list');
            }
            $item->setPrice((float)$price);
        }
        
        if ($description !== null) {
            $item->setDescription(strip_tags($description));
        }
        
        if ($fidelityPoints !== null) {
            if (!is_numeric($fidelityPoints) || $fidelityPoints < 0 || $fidelityPoints > 10000) {
                $this->addFlash('error', 'Les points de fidélité doivent être entre 0 et 10000');
                return $this->redirectToRoute('admin_menu_items_list');
            }
            $item->setFidelityPoints((int)$fidelityPoints);
        }
        
        if ($pointsRedeemPrice !== null) {
            if (!is_numeric($pointsRedeemPrice) || $pointsRedeemPrice < 0 || $pointsRedeemPrice > 100000) {
                $this->addFlash('error', 'Le prix de rachat doit être entre 0 et 100000 points');
                return $this->redirectToRoute('admin_menu_items_list');
            }
            $item->setPointsRedeemPrice((int)$pointsRedeemPrice);
        }
        
        $item->setAvailable($available);

        if ($categorieId) {
            $categorie = $this->em->getRepository(Categorie::class)->find($categorieId);
            if ($categorie) {
                $item->setCategorie($categorie);
            }
        }

        // Handle image upload with security checks
        /** @var UploadedFile $file */
        $file = $request->files->get('image');
        if ($file && $file->isValid()) {
            // Validate file type
            $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
            if (!in_array($file->getClientMimeType(), $allowedMimeTypes)) {
                $this->addFlash('error', 'Format d\'image non autorisé. Utilisez JPG, PNG, GIF ou WebP.');
                return $this->redirectToRoute('admin_menu_items_list');
            }
            
            // Validate file size (max 5MB)
            if ($file->getSize() > 5 * 1024 * 1024) {
                $this->addFlash('error', 'L\'image ne doit pas dépasser 5 MB.');
                return $this->redirectToRoute('admin_menu_items_list');
            }
            
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
