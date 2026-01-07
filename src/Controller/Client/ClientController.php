<?php
namespace App\Controller\Client;

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
                    $dateStr = '';
                    $description = '';
                    
                    // Parse message for title, date, and description
                    foreach ($lines as $i => $line) {
                        if ($i === 0) {
                            $eventTitle = trim($line);
                        } elseif (preg_match('/^Date:\s*(.+)$/i', trim($line), $m)) {
                            $dateStr = trim($m[1]);
                        } elseif (trim($line) !== '') {
                            $description .= trim($line) . "\n";
                        }
                    }
                    $description = trim($description);
                    
                    // Determine status: pending (no event linked) or approved (event linked)
                    $status = $r->getEvent() ? 'approved' : 'pending';
                    
                    $events[] = [
                        'id' => $r->getId(),
                        // show the requested event title to the client
                        'name' => $eventTitle ?: $r->getName(),
                        'message' => $r->getMessage(),
                        'description' => $description,
                        'image' => method_exists($r, 'getImage') ? $r->getImage() : null,
                        'date' => $dateStr ?: ($r->getCreated() ? $r->getCreated()->format('Y-m-d') : null),
                        'approved' => $status === 'approved',
                        'status' => $status,
                        'visibility' => method_exists($r, 'getVisibility') ? $r->getVisibility() : 'public',
                    ];
                }
            } catch (\Throwable $e) {
                $events = [];
            }
            $client['events'] = $events;
        }

        return $this->render('client/pages/account.html.twig', ['client' => $client]);
    }
}
