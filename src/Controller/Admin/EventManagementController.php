<?php
namespace App\Controller\Admin;

use App\Entity\Event;
use App\Entity\EventRequest;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\JsonResponse;

#[Route('/admin/events')]
class EventManagementController extends AbstractController
{
    public function __construct(
        private EntityManagerInterface $em
    ) {
    }

    #[Route('/list', name: 'admin_events_data')]
    public function list(): Response
    {
        // Fetch events without auto-archiving to respect manual status changes
        $events = $this->em->getRepository(Event::class)->findAll();

        // Only show pending requests (those not yet linked to an Event)
        $requests = $this->em->getRepository(EventRequest::class)->findBy(['event' => null], ['created' => 'DESC']);

        // Convert to arrays for JSON encoding in template
        $eventsArray = array_map(fn($e) => [
            'id' => $e->getId(),
            'title' => $e->getTitle(),
            'date' => $e->getDate() ? $e->getDate()->format('Y-m-d') : null,
            'description' => $e->getDescription(),
            'image' => $e->getImage(),
            'status' => $e->getStatus(),
            'visibility' => $e->getVisibility(),
        ], $events);

        $requestsArray = array_map(fn($r) => [
            'id' => $r->getId(),
            'name' => $r->getName(),
            'message' => $r->getMessage(),
            'image' => $r->getImage(),
            'created' => $r->getCreated()->format('Y-m-d H:i:s'),
            'visibility' => $r->getVisibility(),
            'event' => $r->getEvent() ? ['id' => $r->getEvent()->getId()] : null,
        ], $requests);

        return $this->render('admin/events/list.html.twig', [
            'events' => $eventsArray,
            'requests' => $requestsArray
        ]);
    }

    #[Route('/create', name: 'admin_events_create_action', methods: ['POST'])]
    public function create(Request $request): Response
    {
        $title = $request->request->get('title');
        $date = $request->request->get('date');
        $description = $request->request->get('description');
        $status = $request->request->get('status', 'draft');
        $visibility = $request->request->get('visibility', 'public');

        if (empty($title)) {
            $this->addFlash('error', 'Le titre est requis');
            return $this->redirectToRoute('admin_events_data');
        }

        $event = new Event();
        $event->setTitle($title);
        $event->setDescription($description);
        $event->setStatus($status);
        $event->setVisibility($visibility);

        if ($date) {
            try {
                $event->setDate(new \DateTime($date));
            } catch (\Exception $e) {
                // Invalid date
            }
        }

        // Handle image upload - check for base64 data first, then file upload
        $imageData = $request->request->get('image_data');
        if ($imageData && str_starts_with($imageData, 'data:')) {
            $event->setImage($imageData);
        } else {
            /** @var UploadedFile $file */
            $file = $request->files->get('image');
            if ($file && $file->isValid()) {
                $content = file_get_contents($file->getPathname());
                $dataUri = 'data:' . $file->getClientMimeType() . ';base64,' . base64_encode($content);
                $event->setImage($dataUri);
            }
        }

        $this->em->persist($event);
        $this->em->flush();

        $this->addFlash('success', 'Événement créé avec succès');
        return $this->redirectToRoute('admin_events_data');
    }

    #[Route('/{id}/edit-action', name: 'admin_events_update_action', methods: ['POST'])]
    public function update(int $id, Request $request): Response
    {
        $event = $this->em->getRepository(Event::class)->find($id);
        if (!$event) {
            $this->addFlash('error', 'Événement introuvable');
            return $this->redirectToRoute('admin_events_data');
        }

        $title = $request->request->get('title');
        $date = $request->request->get('date');
        $description = $request->request->get('description');
        $status = $request->request->get('status');
        $visibility = $request->request->get('visibility');

        if ($title) $event->setTitle($title);
        if ($description !== null) $event->setDescription($description);
        if ($status) $event->setStatus($status);
        if ($visibility) $event->setVisibility($visibility);

        if ($date) {
            try {
                $event->setDate(new \DateTime($date));
            } catch (\Exception $e) {
                // Invalid date
            }
        }

        // Handle image upload - check for base64 data first, then file upload
        $imageData = $request->request->get('image_data');
        if ($imageData && str_starts_with($imageData, 'data:')) {
            $event->setImage($imageData);
        } else {
            /** @var UploadedFile $file */
            $file = $request->files->get('image');
            if ($file && $file->isValid()) {
                $content = file_get_contents($file->getPathname());
                $dataUri = 'data:' . $file->getClientMimeType() . ';base64,' . base64_encode($content);
                $event->setImage($dataUri);
            }
        }

        $this->em->flush();

        $this->addFlash('success', 'Événement modifié avec succès');
        return $this->redirectToRoute('admin_events_data');
    }

    #[Route('/{id}/delete', name: 'admin_events_delete_action', methods: ['POST'])]
    public function delete(int $id): Response
    {
        $event = $this->em->getRepository(Event::class)->find($id);
        if ($event) {
            $this->em->remove($event);
            $this->em->flush();
            $this->addFlash('success', 'Événement supprimé');
        }

        return $this->redirectToRoute('admin_events_data');
    }

    #[Route('/requests/{id}/accept', name: 'admin_event_requests_accept_action', methods: ['POST'])]
    public function acceptRequest(int $id, Request $request): Response
    {
        $eventRequest = $this->em->getRepository(EventRequest::class)->find($id);
        if (!$eventRequest) {
            $this->addFlash('error', 'Demande introuvable');
            // Return JSON for AJAX
            if ($request->isXmlHttpRequest()) {
                return new JsonResponse(['success' => false, 'error' => 'not_found'], 404);
            }
            return $this->redirectToRoute('admin_events_data');
        }

        // Create event from request
        $event = new Event();
        
        // Extract title and date from message
        $message = $eventRequest->getMessage() ?? '';
        $lines = preg_split('/\r?\n/', trim($message));
        
        $title = !empty($lines[0]) ? mb_substr($lines[0], 0, 120) : 'Demande de ' . $eventRequest->getName();
        $date = null;
        $descriptionLines = [];
        
        foreach (array_slice($lines, 1) as $line) {
            if (preg_match('/Date:\s*(\d{4}-\d{2}-\d{2})/', $line, $matches)) {
                try {
                    $date = new \DateTime($matches[1]);
                } catch (\Exception $e) {
                    // Invalid date
                }
            } else if (trim($line) !== '') {
                $descriptionLines[] = trim($line);
            }
        }
        
        $event->setTitle($title);
        $event->setDescription(implode("\n", $descriptionLines));
        $event->setImage($eventRequest->getImage());
        $event->setVisibility($eventRequest->getVisibility());
        $event->setStatus('published');
        
        if ($date) {
            $event->setDate($date);
        }

        $this->em->persist($event);
        $eventRequest->setEvent($event);
        $this->em->flush();

        // AJAX response: keep row briefly then remove on client
        if ($request->isXmlHttpRequest()) {
            return new JsonResponse([
                'success' => true,
                'requestId' => $id,
                'eventId' => $event->getId(),
                'event' => [
                    'id' => $event->getId(),
                    'title' => $event->getTitle(),
                    'date' => $event->getDate() ? $event->getDate()->format('Y-m-d') : null,
                    'description' => $event->getDescription(),
                    'image' => $event->getImage(),
                    'status' => $event->getStatus(),
                    'visibility' => $event->getVisibility(),
                ],
            ]);
        }

        $this->addFlash('success', 'Demande acceptée et événement créé');
        return $this->redirectToRoute('admin_events_data');
    }

    #[Route('/requests/{id}/delete', name: 'admin_event_requests_delete_action', methods: ['POST'])]
    public function deleteRequest(int $id, Request $request): Response
    {
        $eventRequest = $this->em->getRepository(EventRequest::class)->find($id);
        if ($eventRequest) {
            $this->em->remove($eventRequest);
            $this->em->flush();
            // AJAX response
            if ($request->isXmlHttpRequest()) {
                return new JsonResponse(['success' => true, 'requestId' => $id]);
            }
            $this->addFlash('success', 'Demande supprimée');
        }
        return $this->redirectToRoute('admin_events_data');
    }
}
