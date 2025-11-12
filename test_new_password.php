<?php

// Get the new hash from database
$db = new PDO('sqlite:var/app.db');
$result = $db->query("SELECT password FROM users WHERE email = 'admin@cafe.com'");
$row = $result->fetch(PDO::FETCH_ASSOC);
$hash = $row['password'];

$password = 'password';

echo "🔐 Testing New Bcrypt Password:\n";
echo "===============================\n";
echo "Email: admin@cafe.com\n";
echo "Password: " . $password . "\n";
echo "Hash from DB: " . $hash . "\n";
echo "Verification: " . (password_verify($password, $hash) ? '✅ VALID - LOGIN SHOULD WORK!' : '❌ INVALID') . "\n";
