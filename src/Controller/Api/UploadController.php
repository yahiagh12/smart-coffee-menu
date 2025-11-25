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

        $projectDir = $this->getParameter('kernel.project_dir');
        $uploadsDir = $projectDir . '/public/uploads/' . $type;
        if (!is_dir($uploadsDir)) {
            if (!@mkdir($uploadsDir, 0755, true) && !is_dir($uploadsDir)) {
                return new JsonResponse(['error' => 'Unable to create uploads directory'], 500);
            }
        }
        if (!is_writable($uploadsDir)) {
            return new JsonResponse(['error' => 'Uploads directory is not writable'], 500);
        }

        // Avoid depending on symfony/mime's guessExtension(); prefer client original extension
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
        $filename = uniqid($type.'_', true) . ($ext ? ('.' . $ext) : '');

        try {
            $file->move($uploadsDir, $filename);
        } catch (\Throwable $e) {
            return new JsonResponse(['error' => 'Failed saving uploaded file: ' . $e->getMessage()], 500);
        }

        $url = '/uploads/' . $type . '/' . $filename;
        return new JsonResponse(['url' => $url], 201);
    }
}
