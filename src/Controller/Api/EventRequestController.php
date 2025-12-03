<?php
namespace App\Controller\Api;

use App\Repository\EventRequestRepository;
use App\Repository\EventRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use App\Entity\Event as EventEntity;

#[Route('/api/event-requests')]
class EventRequestController extends ApiController
{
    
    private string $projectDir;

    public function __construct(EventRequestRepository $repo, EventRepository $events, ParameterBagInterface $params)
    {
        $this->repo = $repo;
        $this->events = $events;
        $this->projectDir = $params->get('kernel.project_dir');
    }

    #[Route('/accepted', name: 'api_event_requests_clear_accepted', methods: ['DELETE'])]
    public function clearAccepted()
    {
        $em = $this->repo->getEntityManager();
        $accepted = $this->repo->createQueryBuilder('r')
            ->where('r.event IS NOT NULL')
            ->getQuery()->getResult();
        foreach ($accepted as $r) {
            $em->remove($r);
        }
        $em->flush();
        return $this->jsonResponse(['deleted' => count($accepted)]);
    }

    #[Route('', name: 'api_event_requests_list', methods: ['GET'])]
    public function list(Request $request)
    {
        $eventId = $request->query->get('eventId');
        if ($eventId) {
            $items = $this->repo->findBy(['event' => (int)$eventId], ['created' => 'DESC']);
        } else {
            $items = $this->repo->findBy([], ['created' => 'DESC']);
        }

        $out = array_map(function($r){
            $ev = $r->getEvent();
            return [
                'id' => $r->getId(),
                'eventId' => $ev ? $ev->getId() : null,
                'name' => $r->getName(),
                'message' => $r->getMessage(),
                'image' => method_exists($r, 'getImage') ? $r->getImage() : null,
                'created' => $r->getCreated()->format('Y-m-d H:i:s'),
            ];
        }, $items);

        return $this->ok($out);
    }

    #[Route('', name: 'api_event_requests_create', methods: ['POST'])]
    public function create(Request $request)
    {
        $data = $request->request->all();
        $eventId = $data['eventId'] ?? $request->get('eventId');
        $name = trim((string)($data['name'] ?? ''));
        $message = trim((string)($data['message'] ?? ''));

        if (empty($name)) return $this->error('name required');

        $r = new \App\Entity\EventRequest();
        // attach event if provided
        if (!empty($eventId)) {
            $event = $this->events->find((int)$eventId);
            if ($event) $r->setEvent($event);
        }
        $r->setName($name)->setMessage($message)->setCreated(new \DateTimeImmutable());

        // handle optional uploaded image (field 'image' or 'file')
        $file = $request->files->get('image') ?? $request->files->get('file');
        if ($file instanceof UploadedFile) {
            try {
                $content = file_get_contents($file->getPathname());
                $r->setImage('data:' . $file->getClientMimeType() . ';base64,' . base64_encode($content));
            } catch (\Throwable $ex) {
                // ignore save errors
            }
        }

        $em = $this->repo->getEntityManager();
        $em->persist($r);
        $em->flush();

        return $this->created(['id' => $r->getId()]);
    }

    #[Route('/{id}', name: 'api_event_requests_delete', methods: ['DELETE'])]
    public function delete(int $id)
    {
        $r = $this->repo->find($id);
        if (!$r) return $this->notFound();
        $em = $this->repo->getEntityManager();
        $em->remove($r);
        $em->flush();
        return $this->jsonResponse(null, 204);
    }

    #[Route('/{id}/accept', name: 'api_event_requests_accept', methods: ['POST'])]
    public function accept(int $id)
    {
        $r = $this->repo->find($id);
        if (!$r) return $this->notFound();

        // if already linked, return OK
        if ($r->getEvent()) return $this->ok(['eventId' => $r->getEvent()->getId()]);

        $ev = new EventEntity();
        // build a sensible title: first line of message or 'Demande de {name}'
        $msg = $r->getMessage();
        $title = null;
        if ($msg) {
            $lines = preg_split('/\r?\n/', trim($msg));
            $title = mb_substr($lines[0], 0, 120);
        }
        if (empty($title)) $title = 'Demande client de ' . $r->getName();

        $ev->setTitle($title);
        $ev->setDescription($r->getMessage());
        $ev->setImage($r->getImage());

        $em = $this->repo->getEntityManager();
        $em->persist($ev);
        $r->setEvent($ev);
        $em->flush();

        return $this->created(['eventId' => $ev->getId()]);
    }
}
