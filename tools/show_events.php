<?php
$db = __DIR__ . '/../var/data.db';
if (!file_exists($db)) { echo "Database not found at: $db\n"; exit(1); }
try {
    $pdo = new PDO('sqlite:' . $db);
    echo "Tables:\n";
    $t = $pdo->query("SELECT name FROM sqlite_master WHERE type='table'")->fetchAll(PDO::FETCH_COLUMN);
    echo implode("\n", $t) . "\n\n";
    echo "-- Events --\n";
    $stmt = $pdo->query('SELECT id, title, date, description, image FROM Event');
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($rows) {
        foreach ($rows as $r) {
            echo "ID: {$r['id']}\nTitle: {$r['title']}\nDate: {$r['date']}\nDescription: {$r['description']}\nImage: " . ($r['image']?"yes":"no") . "\n";
            echo str_repeat('-',40) . "\n";
        }
    } else { echo "No events\n"; }

    echo "\n-- Event Requests --\n";
    // try common table names used by Doctrine mapping
    $possible = ['EventRequest', 'event_request', 'event_request'];
    $found = null;
    foreach ($possible as $pn) {
        try {
            $stmt = $pdo->query('SELECT id, event_id, name, message, image, created FROM ' . $pn);
            if ($stmt) { $found = $pn; break; }
        } catch (Exception $e) { continue; }
    }
    if ($found === null) { echo "No event_request table found\n"; exit(0); }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($rows) {
        foreach ($rows as $r) {
            echo "ID: {$r['id']}\nEvent_ID: {$r['event_id']}\nName: {$r['name']}\nMessage: {$r['message']}\nCreated: {$r['created']}\nImage: " . ($r['image']?"yes":"no") . "\n";
            echo str_repeat('-',40) . "\n";
        }
    } else { echo "No requests\n"; }
} catch (Exception $e) { echo "Error: " . $e->getMessage() . "\n"; }
