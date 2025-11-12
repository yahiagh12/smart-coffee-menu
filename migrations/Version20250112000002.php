<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Update user passwords with proper hashing
 */
final class Version20250112000002 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Update user passwords with bcrypt hashing';
    }

    public function up(Schema $schema): void
    {
        // Password: "password" hashed with bcrypt
        $hashedPassword = '$2y$13$8c.EQH2V1KHrv6ghvHGGLu4xBYMYOKpbCr5fEFqFZzvUKvkx/7VaO';

        $this->addSql("UPDATE users SET password = ? WHERE email IN ('admin@cafe.com', 'client1@email.com', 'client2@email.com')", [$hashedPassword]);
    }

    public function down(Schema $schema): void
    {
        // Downgrade if needed
    }
}
