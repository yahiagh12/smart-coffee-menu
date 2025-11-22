<?php
namespace App\Controller\Api;

use App\Repository\CategorieRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

#[Route('/api/categories')]
class CategorieController extends ApiController
{
    public function __construct(private CategorieRepository $repo)
    {
    }

    #[Route('', name: 'api_categories_list', methods: ['GET'])]
    public function list()
    {
        $items = array_map(fn($c) => ['id' => $c->getId(), 'name' => $c->getName()], $this->repo->findAll());
        return $this->ok($items);
    }

    #[Route('/{id}', name: 'api_categories_get', methods: ['GET'])]
    public function get(int $id)
    {
        $c = $this->repo->find($id);
        if (!$c) return $this->notFound();
        return $this->ok(['id' => $c->getId(), 'name' => $c->getName()]);
    }

    #[Route('', name: 'api_categories_create', methods: ['POST'])]
    public function create(Request $request)
    {
        $data = json_decode($request->getContent() ?: '{}', true);
        $name = $data['name'] ?? null;
        if (empty($name)) return $this->error('name required');

        $c = new \App\Entity\Categorie($name);
        $this->repo->getEntityManager()->persist($c);
        $this->repo->getEntityManager()->flush();

        return $this->created(['id' => $c->getId(), 'name' => $c->getName()]);
    }

    #[Route('/{id}', name: 'api_categories_delete', methods: ['DELETE'])]
    public function delete(int $id)
    {
        $c = $this->repo->find($id);
        if (!$c) return $this->notFound();
        $em = $this->repo->getEntityManager();
        $em->remove($c);
        $em->flush();
        return $this->jsonResponse(null, 204);
    }
}