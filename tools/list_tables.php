<?php
try {
    $pdo = new PDO('sqlite:' . __DIR__ . '/../var/data.db');
    $stmt = $pdo->query("SELECT name,type FROM sqlite_master WHERE type IN ('table','view') ORDER BY name");
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (!$rows) {
        echo "No tables found\n";
        exit(0);
    }
    foreach ($rows as $row) {
        echo $row['name'] . ' (' . $row['type'] . ')' . "\n";
    }
} catch (Throwable $e) {
    echo 'Error: ' . $e->getMessage() . PHP_EOL;
}
