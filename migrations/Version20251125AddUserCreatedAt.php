<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20251125AddUserCreatedAt extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add createdAt column to users table';
    }

    public function up(Schema $schema): void
    {
        $platform = $this->connection->getDatabasePlatform();

        // Detect SQLite by platform class
        if ($platform instanceof \Doctrine\DBAL\Platforms\SqlitePlatform) {
            // SQLite disallows adding a column with a non-constant default. Add nullable column then backfill.
            $this->addSql("ALTER TABLE users ADD COLUMN createdAt DATETIME NULL");
            // Backfill existing rows with current timestamp
            $this->addSql("UPDATE users SET createdAt = (datetime('now')) WHERE createdAt IS NULL");
        } else {
            // MySQL / PostgreSQL: add column with CURRENT_TIMESTAMP default
            $this->addSql("ALTER TABLE users ADD createdAt DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL");
        }
    }

    public function down(Schema $schema): void
    {
        $platform = $this->connection->getDatabasePlatform();
        if ($platform instanceof \Doctrine\DBAL\Platforms\SqlitePlatform) {
            // SQLite does not support DROP COLUMN. Recreate the table without createdAt.
            // NOTE: this simplistic approach may lose some constraints/indexes; review if needed.
            $this->addSql('CREATE TABLE users_tmp AS SELECT id, email, password, name, address, phone, fidelite, picture, roles FROM users');
            $this->addSql('DROP TABLE users');
            $this->addSql('ALTER TABLE users_tmp RENAME TO users');
        } else {
            $this->addSql('ALTER TABLE users DROP COLUMN createdAt');
        }
    }
}
