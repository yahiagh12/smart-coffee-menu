<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251203105531 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE Event (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, title VARCHAR(255) NOT NULL, date DATE DEFAULT NULL, description CLOB DEFAULT NULL, image CLOB DEFAULT NULL)');
        $this->addSql('CREATE TABLE EventRequest (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, message CLOB DEFAULT NULL, image CLOB DEFAULT NULL, created DATETIME NOT NULL, event_id INTEGER DEFAULT NULL, CONSTRAINT FK_27B1FD2A71F7E88B FOREIGN KEY (event_id) REFERENCES Event (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_27B1FD2A71F7E88B ON EventRequest (event_id)');
        $this->addSql('CREATE TABLE LoyaltyConfig (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(100) NOT NULL, intValue INTEGER NOT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_40966D585E237E06 ON LoyaltyConfig (name)');
        $this->addSql('CREATE TABLE LoyaltyPoints (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, clientIdentifier VARCHAR(255) DEFAULT NULL, points INTEGER NOT NULL, createdAt DATETIME NOT NULL, updatedAt DATETIME DEFAULT NULL)');
        $this->addSql('CREATE TEMPORARY TABLE __temp__MenuItem AS SELECT id, name, price, description, image, categorie_id FROM MenuItem');
        $this->addSql('DROP TABLE MenuItem');
        $this->addSql('CREATE TABLE MenuItem (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, description CLOB DEFAULT NULL, image CLOB DEFAULT NULL, categorie_id INTEGER DEFAULT NULL, fidelityPoints INTEGER DEFAULT NULL, CONSTRAINT FK_93953FBEBCF5E72D FOREIGN KEY (categorie_id) REFERENCES Categorie (id) ON UPDATE NO ACTION ON DELETE SET NULL NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO MenuItem (id, name, price, description, image, categorie_id) SELECT id, name, price, description, image, categorie_id FROM __temp__MenuItem');
        $this->addSql('DROP TABLE __temp__MenuItem');
        $this->addSql('CREATE INDEX IDX_93953FBEBCF5E72D ON MenuItem (categorie_id)');
        // Add nullable column first (SQLite cannot add a NOT NULL column with a non-constant default),
        // then populate it for existing rows.
        $this->addSql('ALTER TABLE users ADD COLUMN createdAt DATETIME DEFAULT NULL');
        $this->addSql("UPDATE users SET createdAt = datetime('now') WHERE createdAt IS NULL");
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE Event');
        $this->addSql('DROP TABLE EventRequest');
        $this->addSql('DROP TABLE LoyaltyConfig');
        $this->addSql('DROP TABLE LoyaltyPoints');
        $this->addSql('CREATE TEMPORARY TABLE __temp__MenuItem AS SELECT id, name, price, description, image, categorie_id FROM MenuItem');
        $this->addSql('DROP TABLE MenuItem');
        $this->addSql('CREATE TABLE MenuItem (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, description CLOB DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, categorie_id INTEGER DEFAULT NULL, CONSTRAINT FK_93953FBEBCF5E72D FOREIGN KEY (categorie_id) REFERENCES Categorie (id) ON DELETE SET NULL NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO MenuItem (id, name, price, description, image, categorie_id) SELECT id, name, price, description, image, categorie_id FROM __temp__MenuItem');
        $this->addSql('DROP TABLE __temp__MenuItem');
        $this->addSql('CREATE INDEX IDX_93953FBEBCF5E72D ON MenuItem (categorie_id)');
        $this->addSql('CREATE TEMPORARY TABLE __temp__users AS SELECT id, email, password, name, address, phone, fidelite, picture, roles FROM users');
        $this->addSql('DROP TABLE users');
        $this->addSql('CREATE TABLE users (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, email VARCHAR(180) NOT NULL, password VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, address VARCHAR(500) DEFAULT NULL, phone VARCHAR(20) DEFAULT NULL, fidelite INTEGER NOT NULL, picture VARCHAR(255) DEFAULT NULL, roles CLOB NOT NULL)');
        $this->addSql('INSERT INTO users (id, email, password, name, address, phone, fidelite, picture, roles) SELECT id, email, password, name, address, phone, fidelite, picture, roles FROM __temp__users');
        $this->addSql('DROP TABLE __temp__users');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1483A5E9E7927C74 ON users (email)');
    }
}
