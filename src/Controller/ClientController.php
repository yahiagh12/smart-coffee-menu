<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\EventRequestRepository;

class ClientController extends AbstractController
{
    #[Route('/client', name: 'client_home')]
    public function index(EventRequestRepository $requests): Response
    {
        $user = $this->getUser();
        $client = [];
        if ($user) {
            $client = [
                'name' => method_exists($user, 'getName') ? $user->getName() : (method_exists($user, 'getUserIdentifier') ? $user->getUserIdentifier() : ''),
                'email' => method_exists($user, 'getEmail') ? $user->getEmail() : (method_exists($user, 'getUserIdentifier') ? $user->getUserIdentifier() : ''),
                'phone' => method_exists($user, 'getPhone') ? $user->getPhone() : null,
                'picture' => method_exists($user, 'getPicture') ? $user->getPicture() : null,
                'loyalty_points' => method_exists($user, 'getFidelite') ? $user->getFidelite() : 0,
            ];
            // include user's event requests (match by name when possible)
            $name = method_exists($user, 'getName') ? $user->getName() : null;
            $emailId = method_exists($user, 'getEmail') ? $user->getEmail() : null;
            $events = [];
            try {
                if ($name) {
                    $items = $requests->findBy(['name' => $name], ['created' => 'DESC']);
                } else {
                    // fallback: return last few requests
                    $items = $requests->findBy([], ['created' => 'DESC'], 20);
                }
                foreach ($items as $r) {
                    $msg = (string)$r->getMessage();
                    $lines = preg_split('/\r?\n/', trim($msg));
                    $eventTitle = count($lines) ? trim($lines[0]) : '';
                    $description = '';
                    if (count($lines) > 1) {
                        $description = trim(implode("\n", array_slice($lines, 1)));
                    }
                    $events[] = [
                        'id' => $r->getId(),
                        // show the requested event title to the client
                        'name' => $eventTitle ?: $r->getName(),
                        'message' => $r->getMessage(),
                        'description' => $description,
                        'image' => method_exists($r, 'getImage') ? $r->getImage() : null,
                        'date' => $r->getCreated() ? $r->getCreated()->format('Y-m-d H:i:s') : null,
                        'approved' => (bool)$r->getEvent(),
                    ];
                }
            } catch (\Throwable $e) {
                $events = [];
            }
            $client['events'] = $events;
        }

        return $this->render('client/account.html.twig', ['client' => $client]);
    }
}
