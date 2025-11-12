<?php
// Quick database verification script

try {
    $pdo = new PDO('sqlite:var/app.db');
    
    echo "\n📊 Database Contents:\n";
    echo "====================\n\n";
    
    // Count users
    $result = $pdo->query('SELECT COUNT(*) as count FROM users');
    $row = $result->fetch(PDO::FETCH_ASSOC);
    echo "👥 Users: " . $row['count'] . "\n";
    
    // Count categories
    $result = $pdo->query('SELECT COUNT(*) as count FROM categories');
    $row = $result->fetch(PDO::FETCH_ASSOC);
    echo "📂 Categories: " . $row['count'] . "\n";
    
    // Count products
    $result = $pdo->query('SELECT COUNT(*) as count FROM products');
    $row = $result->fetch(PDO::FETCH_ASSOC);
    echo "🍰 Products: " . $row['count'] . "\n";
    
    // Count orders
    $result = $pdo->query('SELECT COUNT(*) as count FROM orders');
    $row = $result->fetch(PDO::FETCH_ASSOC);
    echo "📦 Orders: " . $row['count'] . "\n";
    
    echo "\n📂 Categories List:\n";
    $result = $pdo->query('SELECT * FROM categories');
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "   - " . $row['name'] . "\n";
    }
    
    echo "\n🍰 Sample Products:\n";
    $result = $pdo->query('SELECT p.name, p.price, c.name as category FROM products p JOIN categories c ON p.category_id = c.id LIMIT 5');
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "   - " . $row['name'] . " (" . $row['category'] . ") - " . $row['price'] . "€\n";
    }
    
    echo "\n👤 Test Users:\n";
    $result = $pdo->query('SELECT email, roles FROM users');
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "   - " . $row['email'] . " - " . $row['roles'] . "\n";
    }
    
    echo "\n✅ Database is ready!\n\n";
    
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
    exit(1);
}
