<?php
namespace App\Controller\Public;

use App\Entity\MenuItem;
use App\Entity\Categorie;
use App\Entity\Event;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class CafeController extends AbstractController
{
    public function __construct(
        private EntityManagerInterface $em
    ) {
    }

    #[Route('/cafe_virtuel', name: 'cafe_virtuel')]
    #[Route('/cafe_virtuel', name: 'app_cafe_home')]
    public function show(): Response
    {
        // Get current user and their loyalty points
        $user = $this->getUser();
        $userPoints = 0;
        if ($user && method_exists($user, 'getEmail')) {
            try {
                $loyaltyRecord = $this->em->getRepository(\App\Entity\LoyaltyPoints::class)->findOneByClientIdentifier($user->getEmail());
                $userPoints = $loyaltyRecord ? $loyaltyRecord->getPoints() : 0;
            } catch (\Throwable $e) {
                // Loyalty feature might not be available yet
                $userPoints = 0;
            }
        }

        // Only show available products to clients
        $menuItems = $this->em->getRepository(MenuItem::class)->findBy(['available' => true]);
        $categories = $this->em->getRepository(Categorie::class)->findAll();
        
        // Get public published events only
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
        
        // Filter for public published events
        $events = array_filter($allEvents, function($event) {
            return $event->getVisibility() === 'public' && $event->getStatus() === 'published';
        });
        
        return $this->render('public/cafe.html.twig', [
            'menuItems' => $menuItems,
            'categories' => $categories,
            'events' => array_values($events),
            'userPoints' => $userPoints
        ]);
    }

    #[Route('/profile', name: 'profile_redirect')]
    public function profileRedirect(): Response
    {
        if ($this->isGranted('ROLE_CLIENT')) {
            return $this->redirectToRoute('client_home');
        }

        return $this->redirectToRoute('app_login');
    }
}
