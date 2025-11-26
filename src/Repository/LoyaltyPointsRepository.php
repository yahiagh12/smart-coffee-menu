<?php
namespace App\Repository;

use App\Entity\LoyaltyPoints;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class LoyaltyPointsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LoyaltyPoints::class);
    }

    /**
     * Find a loyalty record by client identifier (nullable).
     */
    public function findOneByClientIdentifier(?string $identifier): ?LoyaltyPoints
    {
        if ($identifier === null) {
            return null;
        }

        return $this->findOneBy(['clientIdentifier' => $identifier]);
    }
}
