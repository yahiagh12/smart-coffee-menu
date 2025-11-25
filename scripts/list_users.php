<?php
$path = __DIR__ . '/../var/data.db';
if (!file_exists($path)) {
    echo "DB not found: $path\n";
    exit(1);
}
$pdo = new PDO('sqlite:' . $path);
$stmt = $pdo->query('SELECT id, email, name, roles FROM users');
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($rows as $r) {
    echo json_encode($r, JSON_UNESCAPED_UNICODE) . PHP_EOL;
}
