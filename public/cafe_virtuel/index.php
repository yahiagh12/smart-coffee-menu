<?php
// Lightweight preview endpoint for /cafe_virtuel when you just want the template preview.
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: text/html; charset=utf-8');
// project root is one level above `public`
$projectRoot = dirname(dirname(__DIR__));
$tpl = $projectRoot . DIRECTORY_SEPARATOR . 'templates-only' . DIRECTORY_SEPARATOR . 'cafe_virtuel.html.twig';
if (file_exists($tpl)) {
    echo file_get_contents($tpl);
    exit(0);
}
http_response_code(404);
echo '<h1>Not Found</h1><p>Template `templates-only/cafe_virtuel.html.twig` not found.</p>';
