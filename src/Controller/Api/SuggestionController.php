<?php
namespace App\Controller\Api;

use App\Entity\Suggestion;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/api/suggestions')]
class SuggestionController extends AbstractController
{
    #[Route('', methods: ['GET'])]
    public function list(EntityManagerInterface $em): JsonResponse
    {
        $suggestions = $em->getRepository(Suggestion::class)->findAll();
        return $this->json($suggestions);
    }

    #[Route('', methods: ['POST'])]
    public function create(Request $request, EntityManagerInterface $em): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $suggestion = new Suggestion();
        $suggestion->setName($data['name'] ?? '');
        $suggestion->setProductIds($data['productIds'] ?? []);
        $suggestion->setPublished($data['published'] ?? false);
        $em->persist($suggestion);
        $em->flush();
        return $this->json($suggestion);
    }

    #[Route('/{id}', methods: ['PUT'])]
    public function update(int $id, Request $request, EntityManagerInterface $em): JsonResponse
    {
        $suggestion = $em->getRepository(Suggestion::class)->find($id);
        if (!$suggestion) {
            return $this->json(['error' => 'Suggestion not found'], 404);
        }
        $data = json_decode($request->getContent(), true);
        if (isset($data['name'])) $suggestion->setName($data['name']);
        if (isset($data['productIds'])) $suggestion->setProductIds($data['productIds']);
        if (isset($data['published'])) $suggestion->setPublished($data['published']);
        $em->flush();
        return $this->json($suggestion);
    }

    #[Route('/{id}', methods: ['DELETE'])]
    public function delete(int $id, EntityManagerInterface $em): JsonResponse
    {
        $suggestion = $em->getRepository(Suggestion::class)->find($id);
        if (!$suggestion) {
            return $this->json(['error' => 'Suggestion not found'], 404);
        }
        $em->remove($suggestion);
        $em->flush();
        return $this->json(['success' => true]);
    }
}