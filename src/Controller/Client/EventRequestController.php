<?php
namespace App\Controller\Client;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/client/event-request')]
class EventRequestController extends AbstractController
{
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
                // ignore image if invalid
                $file = null;
            } else {
                $mime = $file->getClientMimeType();
                if (str_starts_with((string)$mime, 'image/')) {
                    $projectDir = $this->getParameter('kernel.project_dir');
                    $uploadsDir = $projectDir . '/public/uploads/event';
                    if (!is_dir($uploadsDir)) {
                        @mkdir($uploadsDir, 0755, true);
                    }
                    // Prefer original extension; fallback to mime->ext map to avoid requiring symfony/mime
                    $ext = $file->getClientOriginalExtension();
                    if (!$ext) {
                        $mime = $file->getClientMimeType();
                        $map = [
                            'image/jpeg' => 'jpg',
                            'image/png' => 'png',
                            'image/gif' => 'gif',
                            'image/webp' => 'webp',
                            'image/svg+xml' => 'svg',
                        ];
                        $ext = $map[$mime] ?? '';
                    }
                    $filename = uniqid('event_', true) . ($ext ? ('.' . $ext) : '');
                    try {
                        $file->move($uploadsDir, $filename);
                        $imageUrl = '/uploads/event/' . $filename;
                    } catch (\Throwable $e) {
                        // ignore save errors for now
                    }
                }
            }
        }

        // At this stage we accept the request. Persist it to the session so previews show it.
        // In a real app you'd persist the request to the DB and notify admins.
        $session = $request->getSession();
        if ($session) {
            $requests = $session->get('preview_event_requests', []);
            // create a simple id
            $nextId = 1;
            foreach ($requests as $r) {
                if (isset($r['id']) && is_numeric($r['id'])) {
                    $nextId = max($nextId, (int)$r['id'] + 1);
                }
            }
            $new = [
                'id' => $nextId,
                'name' => $name,
                'date' => $date,
                'description' => $description,
                'approved' => false,
                'created' => date('Y-m-d'),
                'image' => $imageUrl,
            ];
            $requests[] = $new;
            $session->set('preview_event_requests', $requests);
        }

        // If the client submitted via fetch/XHR they might expect JSON
        if ($request->isXmlHttpRequest()) {
            return new JsonResponse(['status' => 'ok', 'image' => $imageUrl], 201);
        }

        // redirect back to client account preview so the submitted request is visible
        return new RedirectResponse('/view?t=client/account.html.twig#event-request-submitted');
    }
}
