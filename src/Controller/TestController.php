<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class TestController
{
    #[Route('/test')]
    public function test()
    {
        return new JsonResponse(['status' => 'OK', 'message' => 'Test route working']);
    }
}