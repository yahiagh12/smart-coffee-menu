<?php
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

/**
 * Minimal services.php to ensure bundles (like MakerBundle) can import project service config.
 * This file simply imports the existing `services.yaml` so code that expects a PHP config file won't fail.
 */
return function (ContainerConfigurator $config): void {
    // Import the YAML service definitions already present in this project.
    $config->import('services.yaml');
};
