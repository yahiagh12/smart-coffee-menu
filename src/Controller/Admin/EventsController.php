<?php
namespace App\Controller\Admin;

use App\Entity\Event;
use App\Entity\EventRequest;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class EventsController extends AbstractController
{
    public function __construct(
        private EntityManagerInterface $em
    ) {
    }

    #[Route('/admin/events', name: 'admin_events')]
    public function index(): Response
    {
        // Auto-update event statuses
        $events = $this->em->getRepository(Event::class)->findAll();
        $updated = false;
        foreach ($events as $event) {
            if ($event->updateStatusBasedOnDate()) {
                $updated = true;
            }
        }
        if ($updated) {
            $this->em->flush();
        }

        $requests = $this->em->getRepository(EventRequest::class)->findBy([], ['created' => 'DESC']);

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

    #[Route('/admin/events/list', name: 'admin_events_list')]
    public function list(): Response
    {
        // Auto-update event statuses
        $events = $this->em->getRepository(Event::class)->findAll();
        $updated = false;
        foreach ($events as $event) {
            if ($event->updateStatusBasedOnDate()) {
                $updated = true;
            }
        }
        if ($updated) {
            $this->em->flush();
        }

        $requests = $this->em->getRepository(EventRequest::class)->findBy([], ['created' => 'DESC']);

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

    #[Route('/admin/events/new', name: 'admin_events_new')]
    public function create(): Response
    {
        return $this->render('admin/events/new.html.twig');
    }

    #[Route('/admin/events/{id}/edit', name: 'admin_events_edit')]
    public function edit(int $id): Response
    {
        $event = $this->em->getRepository(Event::class)->find($id);
        if (!$event) {
            $this->addFlash('error', 'Événement introuvable');
            return $this->redirectToRoute('admin_events_list');
        }

        return $this->render('admin/events/edit.html.twig', [
            'event' => $event,
            'id' => $id
        ]);
    }

    #[Route('/admin/events/edit', name: 'admin_events_edit_query')]
    public function editQuery(Request $request): Response
    {
        $id = $request->query->get('id');
        if ($id) {
            return $this->redirectToRoute('admin_events_edit', ['id' => (int)$id]);
        }
        return $this->redirectToRoute('admin_events_list');
    }
}
