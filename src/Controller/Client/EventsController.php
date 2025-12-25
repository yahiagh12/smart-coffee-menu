<?php
namespace App\Controller\Client;

use App\Entity\Event;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/client/events')]
class EventsController extends AbstractController
{
    public function __construct(
        private EntityManagerInterface $em
    ) {
    }

    #[Route('', name: 'client_events_list')]
    public function list(): Response
    {
        $allEvents = $this->em->getRepository(Event::class)->findAll();
        
        // Auto-update statuses
        $updated = false;
        foreach ($allEvents as $event) {
            if ($event->updateStatusBasedOnDate()) {
                $updated = true;
            }
        }
        if ($updated) {
            $this->em->flush();
        }
        
        // Filter for private published events
        $events = array_filter($allEvents, function($event) {
            return $event->getVisibility() === 'private' && $event->getStatus() === 'published';
        });
        
        // Sort by date descending
        usort($events, function($a, $b) {
            $dateA = $a->getDate();
            $dateB = $b->getDate();
            if (!$dateA && !$dateB) return 0;
            if (!$dateA) return 1;
            if (!$dateB) return -1;
            return $dateB <=> $dateA;
        });

        return $this->render('client/pages/events.html.twig', [
            'events' => $events
        ]);
    }
}
