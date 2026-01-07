<?php
require __DIR__ . '/../vendor/autoload.php';
echo 'autoload loaded\n';
echo 'App\\Kernel exists? ' . (class_exists('App\\Kernel') ? 'yes' : 'no') . "\n";
echo 'Listing src files: ' . PHP_EOL;
foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator(__DIR__ . '/../src')) as $f) {
    if ($f->isFile()) echo $f->getPathname() . "\n";
}
