<?php
$db = __DIR__ . '/../var/data.db';
if (!file_exists($db)) {
    echo "Database not found at: $db\n";
    exit(1);
}
try {
    $pdo = new PDO('sqlite:' . $db);
    $stmt = $pdo->query('SELECT id, email, name, roles, phone, fidelite, picture, createdAt FROM users');
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (!$rows) {
        echo "No users found\n";
        exit(0);
    }
    foreach ($rows as $r) {
        echo "ID: " . $r['id'] . "\n";
        echo "Email: " . ($r['email'] ?? '') . "\n";
        echo "Name: " . ($r['name'] ?? '') . "\n";
        echo "Roles: " . ($r['roles'] ?? '') . "\n";
        echo "Phone: " . ($r['phone'] ?? '') . "\n";
        echo "Fidelite: " . ($r['fidelite'] ?? '') . "\n";
        echo "Picture: " . ($r['picture'] ?? '') . "\n";
        echo "CreatedAt: " . ($r['createdAt'] ?? '') . "\n";
        echo str_repeat('-', 40) . "\n";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
    exit(1);
}
