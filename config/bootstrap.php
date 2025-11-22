<?php
// Auto-generated bootstrap for the project environment
use Symfony\Component\Dotenv\Dotenv;

require dirname(__DIR__).'/vendor/autoload.php';

if (file_exists(dirname(__DIR__).'/.env')) {
    if (!class_exists(Dotenv::class)) {
        return;
    }
    (new Dotenv())->bootEnv(dirname(__DIR__).'/.env');
}
