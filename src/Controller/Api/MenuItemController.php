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
                    'categorie' => $item->getCategorie() ? $item->getCategorie()->getId() : null,
                    'image' => $item->getImage() ?: null,
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
                'categorie' => $item->getCategorie() ? $item->getCategorie()->getId() : null,
                'image' => $item->getImage() ?: null,
            ];

            return new JsonResponse($result);
            
        } catch (\Exception $e) {
            return new JsonResponse(['error' => $e->getMessage()], 500);
        }
    }

    #[Route('', name: 'api_menu_items_create', methods: ['POST'])]
    public function create(Request $request): JsonResponse
    {
        try {
            // Support both JSON body and multipart/form-data with file upload
            $data = json_decode($request->getContent() ?: '{}', true);
            $isForm = $request->files->count() > 0 || $request->request->count() > 0;
            if ($isForm) {
                $name = $request->request->get('name');
                $price = $request->request->get('price') !== null ? floatval($request->request->get('price')) : 0.0;
                $description = $request->request->get('description');
                $categorieId = $request->request->get('categorie');
            } else {
                $name = $data['name'] ?? null;
                $price = isset($data['price']) ? floatval($data['price']) : 0.0;
                $description = $data['description'] ?? null;
                $categorieId = $data['categorie'] ?? null;
            }

            if (empty($name)) {
                return new JsonResponse(['error' => 'name required'], 400);
            }

            $item = new \App\Entity\MenuItem();
            $item->setName($name)
                ->setPrice($price)
                ->setDescription($description);

            if ($categorieId) {
                $cat = $this->em->getRepository('App\\Entity\\Categorie')->find($categorieId);
                if ($cat) {
                    $item->setCategorie($cat);
                }
            }

            // handle uploaded image (if any) with defensive checks
            $file = $request->files->get('image');
            if ($file) {
                if (method_exists($file, 'isValid') && !$file->isValid()) {
                    return new JsonResponse(['error' => 'Uploaded file is not valid'], 400);
                }

                $projectDir = $this->getParameter('kernel.project_dir');
                $uploadsDir = $projectDir . '/public/uploads/menu_images';
                if (!is_dir($uploadsDir)) {
                    if (!@mkdir($uploadsDir, 0755, true) && !is_dir($uploadsDir)) {
                        return new JsonResponse(['error' => 'Unable to create uploads directory: ' . $uploadsDir], 500);
                    }
                }
                if (!is_writable($uploadsDir)) {
                    return new JsonResponse(['error' => 'Uploads directory is not writable: ' . $uploadsDir], 500);
                }

                $ext = $file->guessExtension() ?: $file->getClientOriginalExtension();
                $filename = uniqid('mi_', true) . ($ext ? ('.' . $ext) : '');
                try {
                    $file->move($uploadsDir, $filename);
                } catch (\Throwable $e) {
                    return new JsonResponse(['error' => 'Failed saving uploaded file: ' . $e->getMessage()], 500);
                }
                $item->setImage('/uploads/menu_images/' . $filename);
            }

            $this->em->persist($item);
            $this->em->flush();

            $result = [
                'id' => $item->getId(),
                'name' => $item->getName(),
                'price' => $item->getPrice(),
                'description' => $item->getDescription(),
                'categorie' => $item->getCategorie() ? $item->getCategorie()->getId() : null,
                'image' => $item->getImage() ?: null,
            ];

            return new JsonResponse($result, 201);
        } catch (\Throwable $e) {
            return new JsonResponse(['error' => $e->getMessage()], 500);
        }
    }

    // Allow POST as well so clients can submit multipart/form-data for updates via FormData
    #[Route('/{id}', name: 'api_menu_items_update', methods: ['PUT', 'POST'])]
    public function update(int $id, Request $request): JsonResponse
    {
        try {
            $repo = $this->em->getRepository('App\\Entity\\MenuItem');
            $item = $repo->find($id);
            if (!$item) return new JsonResponse(['error' => 'Not found'], 404);

            // support JSON body or form upload
            $isForm = $request->files->count() > 0 || $request->request->count() > 0;
            if ($isForm) {
                $name = $request->request->get('name');
                $price = $request->request->get('price');
                $description = $request->request->get('description');
                $categorie = $request->request->get('categorie');
                if ($name !== null) $item->setName($name);
                if ($price !== null) $item->setPrice(floatval($price));
                if ($description !== null) $item->setDescription($description);
                if ($categorie !== null) {
                    $cat = $categorie ? $this->em->getRepository('App\\Entity\\Categorie')->find($categorie) : null;
                    $item->setCategorie($cat);
                }
                // file handling with checks
                $file = $request->files->get('image');
                if ($file) {
                    if (method_exists($file, 'isValid') && !$file->isValid()) {
                        return new JsonResponse(['error' => 'Uploaded file is not valid'], 400);
                    }
                    $projectDir = $this->getParameter('kernel.project_dir');
                    $uploadsDir = $projectDir . '/public/uploads/menu_images';
                    if (!is_dir($uploadsDir)) {
                        if (!@mkdir($uploadsDir, 0755, true) && !is_dir($uploadsDir)) {
                            return new JsonResponse(['error' => 'Unable to create uploads directory: ' . $uploadsDir], 500);
                        }
                    }
                    if (!is_writable($uploadsDir)) {
                        return new JsonResponse(['error' => 'Uploads directory is not writable: ' . $uploadsDir], 500);
                    }
                    $ext = $file->guessExtension() ?: $file->getClientOriginalExtension();
                    $filename = uniqid('mi_', true) . ($ext ? ('.' . $ext) : '');
                    try {
                        $file->move($uploadsDir, $filename);
                    } catch (\Throwable $e) {
                        return new JsonResponse(['error' => 'Failed saving uploaded file: ' . $e->getMessage()], 500);
                    }
                    $item->setImage('/uploads/menu_images/' . $filename);
                }
            } else {
                $data = json_decode($request->getContent() ?: '{}', true);
                if (isset($data['name'])) $item->setName($data['name']);
                if (isset($data['price'])) $item->setPrice(floatval($data['price']));
                if (array_key_exists('description', $data)) $item->setDescription($data['description']);
                if (array_key_exists('categorie', $data)) {
                    $cat = $data['categorie'] ? $this->em->getRepository('App\\Entity\\Categorie')->find($data['categorie']) : null;
                    $item->setCategorie($cat);
                }
            }

            $this->em->flush();

            $result = [
                'id' => $item->getId(),
                'name' => $item->getName(),
                'price' => $item->getPrice(),
                'description' => $item->getDescription(),
                'categorie' => $item->getCategorie() ? $item->getCategorie()->getId() : null,
                'image' => $item->getImage() ?: null,
            ];

            return new JsonResponse($result, 200);
        } catch (\Throwable $e) {
            return new JsonResponse(['error' => $e->getMessage()], 500);
        }
    }

    #[Route('/{id}', name: 'api_menu_items_delete', methods: ['DELETE'])]
    public function delete(int $id): JsonResponse
    {
        try {
            $repo = $this->em->getRepository('App\\Entity\\MenuItem');
            $item = $repo->find($id);
            if (!$item) return new JsonResponse(null, 204);

            $this->em->remove($item);
            $this->em->flush();

            return new JsonResponse(null, 204);
        } catch (\Throwable $e) {
            return new JsonResponse(['error' => $e->getMessage()], 500);
        }
    }
}