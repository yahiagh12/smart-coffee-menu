<?php
namespace App\Controller\Api;

use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/categories')]
class CategorieController extends ApiController
{
    #[Route('', name: 'api_categories_list', methods: ['GET'])]
    public function list()
    {
        // Return empty array for now - we'll implement this later
        return $this->ok([]);
    }

    #[Route('/{id}', name: 'api_categories_get', methods: ['GET'])]
    public function get(int $id)
    {
        return $this->notFound();
    }

    #[Route('', name: 'api_categories_create', methods: ['POST'])]
    public function create()
    {
        return $this->error('Not implemented');
    }

    #[Route('/{id}', name: 'api_categories_delete', methods: ['DELETE'])]
    public function delete(int $id)
    {
        return $this->error('Not implemented');
    }
}