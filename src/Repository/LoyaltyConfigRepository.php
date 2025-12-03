<?php
namespace App\Repository;

use App\Entity\LoyaltyConfig;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class LoyaltyConfigRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LoyaltyConfig::class);
    }

    public function findOneByName(string $name): ?LoyaltyConfig
    {
        return $this->findOneBy(['name' => $name]);
    }

    /**
     * Get an integer config value by name, return default if not found.
     */
    public function getIntValue(string $name, int $default = 0): int
    {
        $cfg = $this->findOneByName($name);
        return $cfg ? $cfg->getIntValue() : $default;
    }
}
