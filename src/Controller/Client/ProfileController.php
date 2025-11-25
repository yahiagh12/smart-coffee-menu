<?php
namespace App\Controller\Client;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/client/profile')]
class ProfileController extends AbstractController
{
    #[Route('/upload', name: 'client_profile_upload', methods: ['POST'])]
    public function upload(Request $request, EntityManagerInterface $em): JsonResponse
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

        // If a user is logged in, persist the picture data URI to their record so it remains after logout
        $user = $this->getUser();
        if ($user) {
            try {
                $user->setPicture($dataUri);
                $em->persist($user);
                $em->flush();
            } catch (\Throwable $e) {
                // ignore DB persistence errors but still return the uploaded data URI
            }
        }

        return new JsonResponse(['url' => $dataUri], 201);
        return new JsonResponse(['url' => $dataUri], 201);
    }
}
