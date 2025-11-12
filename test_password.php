<?php

$hash = '$2y$13$8c.EQH2V1KHrv6ghvHGGLu4xBYMYOKpbCr5fEFqFZzvUKvkx/7VaO';
$password = 'password';

echo "🔐 Testing Bcrypt Password Verification:\n";
echo "=========================================\n";
echo "Password: " . $password . "\n";
echo "Hash: " . $hash . "\n";
echo "Result: " . (password_verify($password, $hash) ? '✅ VALID' : '❌ INVALID') . "\n";
