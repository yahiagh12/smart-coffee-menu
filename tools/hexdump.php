<?php
$path = __DIR__ . '/../src/Controller/Api/CategorieController.php';
$data = file_get_contents($path);
echo 'len=' . strlen($data) . PHP_EOL;
echo 'first 8 bytes hex: ' . bin2hex(substr($data,0,8)) . PHP_EOL;
echo 'prefix (visible): ' . preg_replace('/\s+/', ' ', substr($data,0,120)) . PHP_EOL;
echo 'ords: ';
for ($i=0;$i<40 && $i<strlen($data); $i++) { echo ord($data[$i]) . ' '; }
echo PHP_EOL;
