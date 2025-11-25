<?php
namespace App\Controller;

use App\Service\LoyaltyService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class LoyaltyController extends AbstractController
{
    #[Route('/loyalty/award', name: 'loyalty_award')]
    public function award(Request $request, LoyaltyService $loyalty): JsonResponse
    {
        // Example usage: /loyalty/award?client=alice@example.com
        $client = $request->query->get('client');
        $record = $loyalty->awardPointsForOrder($client);

        return $this->json([
            'client' => $record->getClientIdentifier(),
            'points' => $record->getPoints(),
        ]);
    }

    #[Route('/loyalty/points', name: 'loyalty_points')]
    public function points(Request $request, LoyaltyService $loyalty): JsonResponse
    {
        $client = $request->query->get('client');
        $points = $loyalty->getPointsForClient($client);
        return $this->json(['client' => $client, 'points' => $points]);
    }
}
