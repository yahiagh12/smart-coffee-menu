<?php
require_once __DIR__ . '/../vendor/autoload.php';

$dbPath = __DIR__ . '/../var/data.db';
$pdo = new PDO('sqlite:' . $dbPath);

$stmt = $pdo->query("PRAGMA table_info(Event)");
$columns = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "Event table columns:\n";
foreach ($columns as $column) {
    echo "  - " . $column['name'] . " (" . $column['type'] . ")\n";
}
