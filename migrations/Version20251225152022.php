<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251225152022 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE Event ADD COLUMN status VARCHAR(50) DEFAULT \'draft\' NOT NULL');
        $this->addSql('ALTER TABLE Event ADD COLUMN visibility VARCHAR(50) DEFAULT \'public\' NOT NULL');
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
        $this->addSql('CREATE TEMPORARY TABLE __temp__Event AS SELECT id, title, date, description, image FROM Event');
        $this->addSql('DROP TABLE Event');
        $this->addSql('CREATE TABLE Event (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, title VARCHAR(255) NOT NULL, date DATE DEFAULT NULL, description CLOB DEFAULT NULL, image CLOB DEFAULT NULL)');
        $this->addSql('INSERT INTO Event (id, title, date, description, image) SELECT id, title, date, description, image FROM __temp__Event');
        $this->addSql('DROP TABLE __temp__Event');
        $this->addSql('CREATE TEMPORARY TABLE __temp__users AS SELECT id, email, password, name, address, phone, fidelite, picture, roles, createdAt FROM users');
        $this->addSql('DROP TABLE users');
        $this->addSql('CREATE TABLE users (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, email VARCHAR(180) NOT NULL, password VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, address VARCHAR(500) DEFAULT NULL, phone VARCHAR(20) DEFAULT NULL, fidelite INTEGER NOT NULL, picture VARCHAR(255) DEFAULT NULL, roles CLOB NOT NULL, createdAt DATETIME DEFAULT NULL)');
        $this->addSql('INSERT INTO users (id, email, password, name, address, phone, fidelite, picture, roles, createdAt) SELECT id, email, password, name, address, phone, fidelite, picture, roles, createdAt FROM __temp__users');
        $this->addSql('DROP TABLE __temp__users');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1483A5E9E7927C74 ON users (email)');
    }
}
