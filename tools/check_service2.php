<?php
require __DIR__ . '/../vendor/autoload.php';
use App\Kernel;
use App\UseCase\MenuItem\CreateMenuItem;

$kernel = new Kernel('dev', true);
$kernel->boot();
$container = $kernel->getContainer();

printf("container has CreateMenuItem? %s\n", $container->has(CreateMenuItem::class) ? 'yes' : 'no');
if ($container->has(CreateMenuItem::class)) {
    $service = $container->get(CreateMenuItem::class);
    printf("service class: %s\n", get_class($service));
}

?>