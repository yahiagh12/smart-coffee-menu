<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20250112000003 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Update user passwords with correct bcrypt hashes for password "password"';
    }

    public function up(Schema $schema): void
    {
        // Generate correct bcrypt hash for "password"
        // This is the bcrypt hash for "password" with cost 13
        $correctHash = password_hash('password', PASSWORD_BCRYPT, ['cost' => 13]);
        
        // Update all test users with the correct password hash
        $this->addSql('UPDATE users SET password = ? WHERE email IN (?, ?, ?)', [
            $correctHash,
            'admin@cafe.com',
            'client1@email.com',
            'client2@email.com'
        ]);
    }

    public function down(Schema $schema): void
    {
        // No down migration needed for this
    }
}
