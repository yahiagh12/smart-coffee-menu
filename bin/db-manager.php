#!/usr/bin/env php
<?php

/**
 * Database Manager - Quick commands for database operations
 * Usage: php bin/db-manager.php <command>
 */

require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

$commands = [
    'create' => 'Create the database',
    'drop' => 'Drop the database (DESTRUCTIVE)',
    'migrate' => 'Run all migrations',
    'rollback' => 'Rollback last migration',
    'reset' => 'Drop and recreate database with migrations',
    'seed' => 'Insert test data',
    'status' => 'Show migration status',
];

if (empty($argv[1])) {
    echo "Database Manager\n";
    echo "================\n\n";
    echo "Available commands:\n";
    foreach ($commands as $cmd => $desc) {
        echo "  php bin/db-manager.php $cmd   - $desc\n";
    }
    exit(0);
}

$command = $argv[1];

if (!isset($commands[$command])) {
    echo "Unknown command: $command\n";
    exit(1);
}

// Run the appropriate Symfony console command
$consoleFile = __DIR__ . '/console';

switch ($command) {
    case 'create':
        passthru("php $consoleFile doctrine:database:create --if-not-exists");
        break;
    case 'drop':
        passthru("php $consoleFile doctrine:database:drop --force");
        break;
    case 'migrate':
        passthru("php $consoleFile doctrine:migrations:migrate --no-interaction");
        break;
    case 'rollback':
        passthru("php $consoleFile doctrine:migrations:migrate prev --no-interaction");
        break;
    case 'reset':
        echo "Resetting database...\n";
        passthru("php $consoleFile doctrine:database:drop --force");
        passthru("php $consoleFile doctrine:database:create");
        passthru("php $consoleFile doctrine:migrations:migrate --no-interaction");
        echo "✅ Database reset complete!\n";
        break;
    case 'seed':
        // Additional seeding commands can go here
        passthru("php $consoleFile doctrine:migrations:migrate --no-interaction");
        break;
    case 'status':
        passthru("php $consoleFile doctrine:migrations:status");
        break;
}
