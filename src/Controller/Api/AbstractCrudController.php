<?php
namespace App\Controller\Api;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

abstract class AbstractCrudController extends ApiController
{
    public function __construct(protected EntityManagerInterface $em)
    {
    }

    /**
     * MUST be implemented by child.
     * Returns the entity class string (e.g. MenuItem::class)
     */
    abstract protected function getEntityClass(): string;

    /**
     * MUST be implemented by child.
     * Returns array representation of entity for JSON response.
     */
    abstract protected function normalize(object $entity): array;

    /**
     * OPTIONAL: Child can override to customize creation.
     */
    protected function createEntity(array $data): object
    {
        $entityClass = $this->getEntityClass();
        $entity = new $entityClass();

        $this->updateEntity($entity, $data);
        return $entity;
    }

    /**
     * OPTIONAL: Child can override to customize update behavior.
     */
    protected function updateEntity(object $entity, array $data): void
    {
        // Default behavior: naive setter mapping
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($entity, $method)) {
                $entity->$method($value);
            }
        }
    }

    // --------------------------------------------------------
    // CRUD METHODS AUTOMATIQUES
    // --------------------------------------------------------

    public function list()
    {
        $repo = $this->em->getRepository($this->getEntityClass());
        $items = array_map(
            fn($item) => $this->normalize($item),
            $repo->findAll()
        );

        return $this->ok($items);
    }

    public function get(int $id)
    {
        $entity = $this->em->getRepository($this->getEntityClass())->find($id);
        if (!$entity) {
            return $this->notFound();
        }

        return $this->ok($this->normalize($entity));
    }

    public function create(Request $request)
    {
        $data = json_decode($request->getContent() ?: '{}', true);

        $entity = $this->createEntity($data);

        $this->em->persist($entity);
        $this->em->flush();

        return $this->created($this->normalize($entity));
    }

    public function update(int $id, Request $request)
    {
        $repo = $this->em->getRepository($this->getEntityClass());
        $entity = $repo->find($id);

        if (!$entity) {
            return $this->notFound();
        }

        $data = json_decode($request->getContent() ?: '{}', true);
        $this->updateEntity($entity, $data);

        $this->em->flush();

        return $this->ok($this->normalize($entity));
    }

    public function delete(int $id)
    {
        $repo = $this->em->getRepository($this->getEntityClass());
        $entity = $repo->find($id);

        if (!$entity) {
            return $this->notFound();
        }

        $this->em->remove($entity);
        $this->em->flush();

        return $this->jsonResponse(null, 204);
    }
}
