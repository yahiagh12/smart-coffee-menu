<?php
namespace App\Service;

use App\Entity\LoyaltyPoints;
use App\Repository\LoyaltyPointsRepository;
use App\Repository\LoyaltyConfigRepository;
use Doctrine\ORM\EntityManagerInterface;

class LoyaltyService
{
    private EntityManagerInterface $em;
    private LoyaltyPointsRepository $repo;

    // Default fallback if no config entry exists
    private const DEFAULT_POINTS_PER_ORDER = 10;

    private LoyaltyConfigRepository $configRepo;

    public function __construct(EntityManagerInterface $em, LoyaltyPointsRepository $repo, LoyaltyConfigRepository $configRepo)
    {
        $this->em = $em;
        $this->repo = $repo;
        $this->configRepo = $configRepo;
    }

    /**
     * Award fixed points for a completed order to a given client identifier.
     * If $clientIdentifier is null the method will create a record with null identifier.
     */
    public function awardPointsForOrder(?string $clientIdentifier): LoyaltyPoints
    {
        $record = null;
        if ($clientIdentifier !== null) {
            $record = $this->repo->findOneByClientIdentifier($clientIdentifier);
        }

        if (!$record) {
            $record = new LoyaltyPoints($clientIdentifier);
            $this->em->persist($record);
        }

        $points = $this->getPointsPerOrder();
        $record->addPoints($points);
        $this->em->flush();

        return $record;
    }

    /**
     * Award points based on order items with per-product loyalty points.
     * 
     * @param array $items Order items with format: ['id' => int, 'name' => string, 'quantity' => int, 'price' => float, 'fidelityPoints' => ?int]
     * @param ?string $clientIdentifier Optional client email/identifier
     * @return LoyaltyPoints The updated loyalty record
     */
    public function awardPointsFromItems(array $items, ?string $clientIdentifier = null): LoyaltyPoints
    {
        $record = null;
        if ($clientIdentifier !== null) {
            $record = $this->repo->findOneByClientIdentifier($clientIdentifier);
        }

        if (!$record) {
            $record = new LoyaltyPoints($clientIdentifier);
            $this->em->persist($record);
        }

        // Calculate total points from items
        $totalPoints = 0;
        foreach ($items as $item) {
            $itemPoints = isset($item['fidelityPoints']) && $item['fidelityPoints'] > 0 ? $item['fidelityPoints'] : 0;
            $quantity = isset($item['quantity']) ? (int)$item['quantity'] : 1;
            $totalPoints += $itemPoints * $quantity;
        }

        if ($totalPoints > 0) {
            $record->addPoints($totalPoints);
        }

        $this->em->flush();

        return $record;
    }

    public function getPointsForClient(?string $clientIdentifier): int
    {
        if ($clientIdentifier === null) {
            return 0;
        }
        $record = $this->repo->findOneByClientIdentifier($clientIdentifier);
        return $record ? $record->getPoints() : 0;
    }

    private function getPointsPerOrder(): int
    {
        try {
            return $this->configRepo->getIntValue('points_per_order', self::DEFAULT_POINTS_PER_ORDER);
        } catch (\Throwable $e) {
            return self::DEFAULT_POINTS_PER_ORDER;
        }
    }
}
