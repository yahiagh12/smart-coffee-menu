<?php
namespace App\Controller\Client;

use App\Entity\EventRequest;
use App\Repository\EventRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/client/event-request')]
class EventRequestController extends AbstractController
{
    public function __construct(private EventRepository $events, private EntityManagerInterface $em)
    {
    }

    #[Route('', name: 'client_event_request', methods: ['POST'])]
    public function submit(Request $request): Response
    {
        $name = (string) $request->request->get('event_name', '');
        $date = (string) $request->request->get('event_date', '');
        $description = (string) $request->request->get('event_description', '');

        // optional image
        $file = $request->files->get('image') ?? null;
        $imageUrl = null;
        if ($file) {
            if (method_exists($file, 'isValid') && !$file->isValid()) {
                $file = null;
            } else {
                $mime = $file->getClientMimeType();
                if (str_starts_with((string)$mime, 'image/')) {
                    try {
                        $content = file_get_contents($file->getPathname());
                        $imageUrl = 'data:' . $file->getClientMimeType() . ';base64,' . base64_encode($content);
                    } catch (\Throwable $e) {
                        // ignore
                    }
                }
            }
        }

        // Persist as EventRequest linked to an Event if possible
        $eventId = (int) $request->request->get('event_id', 0);
        $event = null;
        if ($eventId) {
            $event = $this->events->find($eventId);
        }

        $req = new EventRequest();
        if ($event) $req->setEvent($event);

        // If the user is logged in, store the requester name in the `name` field
        // and place the requested event title as the first line of the message so
        // admin accept will pick it up as the event title.
        $user = $this->getUser();
        $requesterName = null;
        if ($user) {
            if (method_exists($user, 'getName')) $requesterName = $user->getName();
            elseif (method_exists($user, 'getUserIdentifier')) $requesterName = $user->getUserIdentifier();
        }

        if ($requesterName) {
            $req->setName($requesterName);
        } else {
            // fallback: use a generic label so client controller can still find recent requests
            $req->setName('Visiteur');
        }

        // Put the requested event title as the first line of the message so admin/accept uses it
        $fullMessage = trim(($name ? $name . "\n" : '') . "\n" . $description);
        $req->setMessage($fullMessage ?: '');
        $req->setCreated(new \DateTimeImmutable());
        if ($imageUrl) $req->setImage($imageUrl);

        $this->em->persist($req);
        $this->em->flush();

        if ($request->isXmlHttpRequest()) {
            return new JsonResponse(['status' => 'ok', 'id' => $req->getId(), 'image' => $imageUrl], 201);
        }

        // Redirect back to the form page so the user stays on "Demander un événement"
        return new RedirectResponse('/view?t=client/event_request_form.html.twig#submitted');
    }
}
