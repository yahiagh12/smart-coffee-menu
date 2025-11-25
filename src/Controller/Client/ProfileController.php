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

        $projectDir = $this->getParameter('kernel.project_dir');
        $uploadsDir = $projectDir . '/public/uploads/user';
        if (!is_dir($uploadsDir)) {
            if (!@mkdir($uploadsDir, 0755, true) && !is_dir($uploadsDir)) {
                return new JsonResponse(['error' => 'Unable to create uploads directory'], 500);
            }
        }
        if (!is_writable($uploadsDir)) {
            return new JsonResponse(['error' => 'Uploads directory is not writable'], 500);
        }

        // Prefer the original extension; fallback to a small mime->ext map to avoid requiring symfony/mime
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
        $filename = uniqid('user_', true) . ($ext ? ('.' . $ext) : '');

        try {
            $file->move($uploadsDir, $filename);
        } catch (\Throwable $e) {
            return new JsonResponse(['error' => 'Failed saving uploaded file: ' . $e->getMessage()], 500);
        }

        $url = '/uploads/user/' . $filename;
        // If a user is logged in, persist the picture URL to their record so it remains after logout
        $user = $this->getUser();
        if ($user) {
            try {
                $user->setPicture($url);
                $em->persist($user);
                $em->flush();
            } catch (\Throwable $e) {
                // ignore DB persistence errors but still return the uploaded URL
            }
        }

        return new JsonResponse(['url' => $url], 201);
    }
}
