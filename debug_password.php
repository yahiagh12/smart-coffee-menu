<?php

$db = new PDO('sqlite:var/app.db');
$result = $db->query('SELECT email, password FROM user');

echo "📋 Passwords in Database:\n";
echo str_repeat("=", 80) . "\n";

while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    echo "Email: " . $row['email'] . "\n";
    echo "Hash: " . $row['password'] . "\n";
    echo "\n";
}

echo "\n🔍 Test Bcrypt Verification:\n";
echo str_repeat("=", 80) . "\n";

$password = 'password';
$testHash = '$2y$13$8c.EQH2V1KHrv6ghvHGGLu4xBYMYOKpbCr5fEFqFZzvUKvkx/7VaO';

if (password_verify($password, $testHash)) {
    echo "✅ Bcrypt verification works!\n";
} else {
    echo "❌ Bcrypt verification failed!\n";
}

// Test with actual password from DB
$result = $db->query("SELECT email, password FROM user WHERE email = 'admin@cafe.com'");
$user = $result->fetch(PDO::FETCH_ASSOC);

if ($user) {
    echo "\n🔐 Testing admin@cafe.com:\n";
    echo "Stored hash: " . $user['password'] . "\n";
    echo "Testing with 'password': " . (password_verify($password, $user['password']) ? "✅ OK" : "❌ FAIL") . "\n";
}
