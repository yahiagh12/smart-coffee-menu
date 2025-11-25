<?php
namespace App\Controller\Api;

use App\Repository\EventRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\UploadedFile;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

#[Route('/api/events')]
class EventController extends ApiController
{
    private string $projectDir;

    public function __construct(private EventRepository $repo, ParameterBagInterface $params)
    {
        $this->projectDir = $params->get('kernel.project_dir');
    }

    #[Route('', name: 'api_events_list', methods: ['GET'])]
    public function list()
    {
        $items = array_map(function($e){
            return [
                'id' => $e->getId(),
                'title' => $e->getTitle(),
                'date' => $e->getDate() ? $e->getDate()->format('Y-m-d') : null,
                'description' => $e->getDescription(),
                'image' => $e->getImage(),
            ];
        }, $this->repo->findAll());

        return $this->ok($items);
    }

    #[Route('/{id}', name: 'api_events_get', methods: ['GET'])]
    public function get(int $id)
    {
        $e = $this->repo->find($id);
        if (!$e) return $this->notFound();
        return $this->ok([
            'id' => $e->getId(),
            'title' => $e->getTitle(),
            'date' => $e->getDate() ? $e->getDate()->format('Y-m-d') : null,
            'description' => $e->getDescription(),
            'image' => $e->getImage(),
        ]);
    }

    #[Route('', name: 'api_events_create', methods: ['POST'])]
    public function create(Request $request)
    {
        $title = $request->request->get('title') ?? null;
        if (empty($title)) return $this->error('title required');

        $date = $request->request->get('date') ?? null;
        $description = $request->request->get('description') ?? null;

        $image = $request->request->get('image') ?? null;
        $file = $request->files->get('image') ?? $request->files->get('file');
            if ($file instanceof UploadedFile) {
                try {
                    $content = file_get_contents($file->getPathname());
                    $image = 'data:' . $file->getClientMimeType() . ';base64,' . base64_encode($content);
                } catch (\Throwable $ex) {
                    $image = null;
                }
        }

        $e = new \App\Entity\Event();
        $e->setTitle($title);
        if ($date) {
            try { $e->setDate(new \DateTime($date)); } catch (\Throwable $t) { }
        }
        $e->setDescription($description);
        $e->setImage($image);

        $em = $this->repo->getEntityManager();
        $em->persist($e);
        $em->flush();

        return $this->created(['id' => $e->getId()]);
    }

    #[Route('/{id}', name: 'api_events_update', methods: ['POST','PUT'])]
    public function update(int $id, Request $request)
    {
        $e = $this->repo->find($id);
        if (!$e) return $this->notFound();

        $title = $request->request->get('title') ?? null;
        if ($title) $e->setTitle($title);

        $date = $request->request->get('date') ?? null;
        if ($date) {
            try { $e->setDate(new \DateTime($date)); } catch (\Throwable $t) { }
        }

        $description = $request->request->get('description') ?? null;
        if ($description !== null) $e->setDescription($description);

        $file = $request->files->get('image') ?? $request->files->get('file');
            if ($file instanceof UploadedFile) {
                try {
                    $content = file_get_contents($file->getPathname());
                    $e->setImage('data:' . $file->getClientMimeType() . ';base64,' . base64_encode($content));
                } catch (\Throwable $ex) {
                    // ignore
                }
        }

        $em = $this->repo->getEntityManager();
        $em->flush();

        return $this->ok(['id' => $e->getId()]);
    }

    #[Route('/{id}', name: 'api_events_delete', methods: ['DELETE'])]
    public function delete(int $id)
    {
        $e = $this->repo->find($id);
        if (!$e) return $this->notFound();
        $em = $this->repo->getEntityManager();
        $em->remove($e);
        $em->flush();
        return $this->jsonResponse(null, 204);
    }
}
