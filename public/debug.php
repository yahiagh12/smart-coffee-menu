<?php
require_once dirname(__DIR__).'/vendor/autoload.php';

use App\Kernel;

error_reporting(E_ALL);
ini_set('display_errors', 1);

try {
    $kernel = new Kernel('dev', true);
    $kernel->boot();
    
    // Test the repository directly
    $container = $kernel->getContainer();
    $repo = $container->get('App\Repository\MenuItemRepository');
    $items = $repo->findAll();
    
    echo "Found " . count($items) . " menu items:\n";
    foreach ($items as $item) {
        echo $item->getId() . ": " . $item->getName() . " - " . $item->getPrice() . "\n";
    }
    
} catch (Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
    echo "FILE: " . $e->getFile() . ":" . $e->getLine() . "\n";
    echo "TRACE:\n" . $e->getTraceAsString() . "\n";
}