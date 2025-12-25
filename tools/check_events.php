<?php
require_once __DIR__ . '/../vendor/autoload.php';

$dbPath = __DIR__ . '/../var/data.db';
$pdo = new PDO('sqlite:' . $dbPath);

// Check events
$stmt = $pdo->query("SELECT id, title, date, status, visibility FROM Event");
$events = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "=== EVENTS ===\n";
if (empty($events)) {
    echo "No events found.\n";
} else {
    foreach ($events as $event) {
        echo sprintf("ID: %d | Title: %s | Date: %s | Status: %s | Visibility: %s\n",
            $event['id'],
            $event['title'],
            $event['date'],
            $event['status'],
            $event['visibility']
        );
    }
}

echo "\n=== EVENT REQUESTS ===\n";
$stmt = $pdo->query("SELECT id, name, message, created FROM EventRequest");
$requests = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (empty($requests)) {
    echo "No event requests found.\n";
} else {
    foreach ($requests as $req) {
        echo sprintf("ID: %d | Name: %s | Message: %s | Created: %s\n",
            $req['id'],
            $req['name'],
            substr($req['message'], 0, 50),
            $req['created']
        );
    }
}
