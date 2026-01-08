<?php
// Fix loyalty points by consolidating name-based identifiers to email-based ones

require_once __DIR__ . '/../vendor/autoload.php';

use App\Entity\LoyaltyPoints;
use Symfony\Component\Dotenv\Dotenv;

// Load .env
(new Dotenv())->usePutenv()->bootEnv(__DIR__ . '/../.env');

$kernel = new \App\Kernel($_SERVER['APP_ENV'] ?? 'dev', (bool)($_SERVER['APP_DEBUG'] ?? false));
$kernel->boot();

// Get EntityManager from the container - use get with public access
$container = $kernel->getContainer();
try {
    $em = $container->get('doctrine.orm.default_entity_manager');
} catch (\Throwable $e) {
    // Fallback: use doctrine registry
    $em = $container->get('doctrine')->getManager();
}
$repo = $em->getRepository(LoyaltyPoints::class);

// Mapping of names/identifiers to correct emails
$mappings = [
    'sad dasd' => 'youssef@tek-up.de',
    'youssef kh' => 'youssefkhemakhem2018@gmail.com',
];

foreach ($mappings as $oldIdentifier => $newEmail) {
    echo "Processing: $oldIdentifier → $newEmail\n";
    
    $oldRecord = $repo->findOneByClientIdentifier($oldIdentifier);
    if (!$oldRecord) {
        echo "  ❌ Old record not found for '$oldIdentifier'\n";
        continue;
    }
    
    $oldPoints = $oldRecord->getPoints();
    echo "  Found old record with $oldPoints points\n";
    
    $newRecord = $repo->findOneByClientIdentifier($newEmail);
    if ($newRecord) {
        // Merge: add old points to new record
        echo "  Found existing record with {$newRecord->getPoints()} points\n";
        $newRecord->addPoints($oldPoints);
        echo "  ✓ Merged points: {$newRecord->getPoints()} total\n";
    } else {
        // Create new record with the points
        $newRecord = new LoyaltyPoints($newEmail);
        $newRecord->setPoints($oldPoints);
        $em->persist($newRecord);
        echo "  ✓ Created new record with $oldPoints points\n";
    }
    
    // Remove old record
    $em->remove($oldRecord);
    echo "  ✓ Removed old record\n";
}

$em->flush();
echo "\n✅ All loyalty points have been consolidated to email identifiers!\n";
