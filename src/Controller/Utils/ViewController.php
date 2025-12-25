<?php
namespace App\Controller\Utils;

use App\Repository\EventRequestRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\HttpKernelInterface;

class ViewController extends AbstractController
{
    /**
     * Render a template from `templates-only` via ?t=path/to/template.html.twig
     * Only allows files under the configured `templates-only` directory and
     * blocks directory traversal for safety.
     */
    #[Route('/view', name: 'view_template', methods: ['GET','POST'])]
    public function view(Request $request, EventRequestRepository $requestsRepo): Response
    {
        $t = (string) $request->query->get('t', '');

        if ($t === '') {
            return new Response('Template parameter missing', 400);
        }

        // Prevent directory traversal and absolute paths
        if (str_contains($t, '..') || str_starts_with($t, '/') || str_starts_with($t, '\\')) {
            return new Response('Invalid template path', 400);
        }

        // Resolve to project templates-only directory
        $projectDir = $this->getParameter('kernel.project_dir');
        $templateFile = $projectDir . '/templates-only/' . $t;

        if (!is_file($templateFile)) {
            return new Response('Template not found: ' . htmlspecialchars($t, ENT_QUOTES), 404);
        }

        // Render the template by its relative name (Twig is configured to use templates-only)
        // Provide safe defaults for commonly-used variables so previews don't fail
        $defaults = [
            'success' => null,
            'error' => null,
            'client' => [],
            'user' => null,
        ];

        try {
            // If previewing the client account, inject any session-stored preview event requests
            if ($t === 'client/account.html.twig') {
                // load recent event requests so preview templates can render them
                $reqs = $requestsRepo->findBy([], ['created' => 'DESC'], 50);
                $out = array_map(function($r){
                    return [
                        'id' => $r->getId(),
                        'name' => $r->getName(),
                        'description' => $r->getMessage(),
                        'date' => $r->getCreated() ? $r->getCreated()->format('Y-m-d') : null,
                        'approved' => false, // Placeholder, add logic if approval implemented
                        'image' => method_exists($r, 'getImage') ? $r->getImage() : null,
                    ];
                }, $reqs);
                $defaults['client'] = ['events' => $out];
            }
            // If previewing the event request form and the request is a POST, forward to the real handler
            if ($request->isMethod('POST') && $t === 'client/event_request_form.html.twig') {
                // create a sub-request that preserves POST params and uploaded files
                $subRequest = Request::create('/client/event-request', 'POST', $request->request->all(), $request->cookies->all(), $request->files->all(), $request->server->all(), $request->getContent());
                $subRequest->attributes->set('_route', 'client_event_request');
                // let the HttpKernel handle the sub-request so controllers and services are invoked
                $response = $this->container->get('http_kernel')->handle($subRequest, HttpKernelInterface::SUB_REQUEST);
                return $response;
            }

            return $this->render($t, $defaults);
        } catch (\Throwable $e) {
            return new Response('Failed rendering template: ' . $e->getMessage(), 500);
        }
    }
}
