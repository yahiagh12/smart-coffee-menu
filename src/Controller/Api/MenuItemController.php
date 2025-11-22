<?php
namespace App\Controller\Api;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/menu-items')]
class MenuItemController extends AbstractController
{
    public function __construct(
        private EntityManagerInterface $em
    ) {
    }

    #[Route('', name: 'api_menu_items_list', methods: ['GET'])]
    public function list(): JsonResponse
    {
        try {
            // Use EntityManager directly
            $repo = $this->em->getRepository('App\Entity\MenuItem');
            $items = $repo->findAll();
            
            // Manual mapping
            $result = [];
            foreach ($items as $item) {
                $result[] = [
                    'id' => $item->getId(),
                    'name' => $item->getName(),
                    'price' => $item->getPrice(),
                    'description' => $item->getDescription(),
                    'categorie' => $item->getCategorie() ? $item->getCategorie()->getId() : null
                ];
            }
            
            return new JsonResponse($result);
            
        } catch (\Exception $e) {
            return new JsonResponse(['error' => $e->getMessage()], 500);
        }
    }

    #[Route('/{id}', name: 'api_menu_items_get', methods: ['GET'])]
    public function get(int $id): JsonResponse
    {
        try {
            $repo = $this->em->getRepository('App\Entity\MenuItem');
            $item = $repo->find($id);
            
            if (!$item) {
                return new JsonResponse(['error' => 'Not found'], 404);
            }

            $result = [
                'id' => $item->getId(),
                'name' => $item->getName(),
                'price' => $item->getPrice(),
                'description' => $item->getDescription(),
                'categorie' => $item->getCategorie() ? $item->getCategorie()->getId() : null
            ];

            return new JsonResponse($result);
            
        } catch (\Exception $e) {
            return new JsonResponse(['error' => $e->getMessage()], 500);
        }
    }

    // Simple versions of other methods
    #[Route('', name: 'api_menu_items_create', methods: ['POST'])]
    public function create(Request $request): JsonResponse
    {
        return new JsonResponse(['message' => 'Create endpoint'], 201);
    }

    #[Route('/{id}', name: 'api_menu_items_update', methods: ['PUT'])]
    public function update(int $id, Request $request): JsonResponse
    {
        return new JsonResponse(['message' => 'Update endpoint'], 200);
    }

    #[Route('/{id}', name: 'api_menu_items_delete', methods: ['DELETE'])]
    public function delete(int $id): JsonResponse
    {
        return new JsonResponse(null, 204);
    }
}