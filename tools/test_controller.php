<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Kernel;
use Symfony\Component\HttpFoundation\Request;

$kernel = new Kernel('dev', true);
$kernel->boot();

// Get the container
$container = $kernel->getContainer();

// Get the controller service
$controller = $container->get('App\Controller\Admin\EventsController');

// Create a request
$request = Request::create('/admin/events/list');

// Call the list method
$response = $controller->list();

echo "Response Status: " . $response->getStatusCode() . "\n";
echo "Content:\n";
echo substr($response->getContent(), 0, 2000) . "\n";
