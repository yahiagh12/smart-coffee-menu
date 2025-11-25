<?php
namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/upload')]
class UploadController extends AbstractController
{
    /**
     * Generic upload endpoint.
     * POST /api/upload/{type}
     * accepted types: user, event, product, menu_images
     */
    #[Route('/{type}', name: 'api_upload', methods: ['POST'])]
    public function upload(string $type, Request $request): JsonResponse
    {
        $allowed = ['user', 'event', 'product', 'menu_images'];
        if (!in_array($type, $allowed, true)) {
            return new JsonResponse(['error' => 'Invalid upload type'], 400);
        }

        $file = $request->files->get('file') ?? $request->files->get('image') ?? null;
        if (!$file) {
            return new JsonResponse(['error' => 'No file uploaded'], 400);
        }

        if (method_exists($file, 'isValid') && !$file->isValid()) {
            return new JsonResponse(['error' => 'Uploaded file is not valid'], 400);
        }

        $mime = $file->getClientMimeType();
        if (!str_starts_with((string)$mime, 'image/')) {
            return new JsonResponse(['error' => 'Only image uploads are allowed'], 400);
        }

        // Read file contents and return a data URI (store-in-db flow)
        try {
            $content = file_get_contents($file->getPathname());
            $b64 = base64_encode($content);
            $dataUri = 'data:' . $file->getClientMimeType() . ';base64,' . $b64;
        } catch (\Throwable $e) {
            return new JsonResponse(['error' => 'Failed reading uploaded file: ' . $e->getMessage()], 500);
        }

        // Return data URI as `url` so frontend can use it directly as image src
        return new JsonResponse(['url' => $dataUri], 201);
    }
}
