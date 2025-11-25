<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251125210403 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE LoyaltyConfig (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(100) NOT NULL, intValue INTEGER NOT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_40966D585E237E06 ON LoyaltyConfig (name)');
        $this->addSql('CREATE TABLE LoyaltyPoints (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, clientIdentifier VARCHAR(255) DEFAULT NULL, points INTEGER NOT NULL, createdAt DATETIME NOT NULL, updatedAt DATETIME DEFAULT NULL)');
        $this->addSql('CREATE TEMPORARY TABLE __temp__users AS SELECT id, email, password, name, address, phone, fidelite, roles, picture, createdAt FROM users');
        $this->addSql('DROP TABLE users');
        $this->addSql('CREATE TABLE users (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, email VARCHAR(180) NOT NULL, password VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, address VARCHAR(500) DEFAULT NULL, phone VARCHAR(20) DEFAULT NULL, fidelite INTEGER NOT NULL, roles CLOB NOT NULL, picture VARCHAR(255) DEFAULT NULL, createdAt DATETIME NOT NULL)');
        $this->addSql('INSERT INTO users (id, email, password, name, address, phone, fidelite, roles, picture, createdAt) SELECT id, email, password, name, address, phone, fidelite, roles, picture, createdAt FROM __temp__users');
        $this->addSql('DROP TABLE __temp__users');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1483A5E9E7927C74 ON users (email)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE LoyaltyConfig');
        $this->addSql('DROP TABLE LoyaltyPoints');
        $this->addSql('CREATE TEMPORARY TABLE __temp__users AS SELECT id, email, password, name, address, phone, fidelite, picture, roles, createdAt FROM users');
        $this->addSql('DROP TABLE users');
        $this->addSql('CREATE TABLE users (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, email VARCHAR(180) NOT NULL, password VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, address VARCHAR(500) DEFAULT NULL, phone VARCHAR(20) DEFAULT NULL, fidelite INTEGER NOT NULL, picture VARCHAR(255) DEFAULT NULL, roles CLOB NOT NULL, createdAt DATETIME DEFAULT NULL)');
        $this->addSql('INSERT INTO users (id, email, password, name, address, phone, fidelite, picture, roles, createdAt) SELECT id, email, password, name, address, phone, fidelite, picture, roles, createdAt FROM __temp__users');
        $this->addSql('DROP TABLE __temp__users');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1483A5E9E7927C74 ON users (email)');
    }
}
