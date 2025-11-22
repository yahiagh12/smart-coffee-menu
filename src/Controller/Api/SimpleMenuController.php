<?php
namespace App\Controller\Api;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

#[Route('/api/simple-menu')]
class SimpleMenuController
{
    #[Route('', name: 'api_simple_menu_list', methods: ['GET'])]
    public function list(): JsonResponse
    {
        $data = [
            [
                'id' => 1,
                'name' => 'Orange Juice',
                'price' => 3.2,
                'description' => 'Fresh pressed oranges',
                'categorie' => null
            ],
            [
                'id' => 2,
                'name' => 'Test Coffee', 
                'price' => 4.5,
                'description' => 'Test item',
                'categorie' => null
            ]
        ];
        
        return new JsonResponse($data);
    }
}