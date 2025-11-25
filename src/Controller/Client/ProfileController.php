<?php
namespace App\Controller\Client;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/client/profile')]
class ProfileController extends AbstractController
{
    #[Route('/upload', name: 'client_profile_upload', methods: ['POST'])]
    public function upload(Request $request): JsonResponse
    {
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

        try {
            $content = file_get_contents($file->getPathname());
            $dataUri = 'data:' . $file->getClientMimeType() . ';base64,' . base64_encode($content);
        } catch (\Throwable $e) {
            return new JsonResponse(['error' => 'Failed reading uploaded file: ' . $e->getMessage()], 500);
        }

        return new JsonResponse(['url' => $dataUri], 201);
    }
}
