<?php
require __DIR__ . '/../vendor/autoload.php';
$class = 'App\\UseCase\\MenuItem\\CreateMenuItem';
printf("Checking class %s\n", $class);
printf("class_exists (autoload): %s\n", class_exists($class, true) ? 'true' : 'false');
printf("is_file path: %s\n", is_file(__DIR__ . '/../src/UseCase/MenuItem/CreateMenuItem.php') ? 'true' : 'false');
$contents = file_get_contents(__DIR__ . '/../src/UseCase/MenuItem/CreateMenuItem.php');
printf("file len=%d bytes\n", strlen($contents));
printf("first 80 bytes: %s\n", substr($contents, 0, 80));
printf("raw starts with bytes: ");
for ($i = 0; $i < 4; $i++) printf("%02x ", ord($contents[$i]));
printf("\n");
?>