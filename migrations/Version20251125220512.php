<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251125220512 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE Categorie (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE Event (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, title VARCHAR(255) NOT NULL, date DATE DEFAULT NULL, description CLOB DEFAULT NULL, image CLOB DEFAULT NULL)');
        $this->addSql('CREATE TABLE EventRequest (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, message CLOB DEFAULT NULL, image CLOB DEFAULT NULL, created DATETIME NOT NULL, event_id INTEGER DEFAULT NULL, CONSTRAINT FK_27B1FD2A71F7E88B FOREIGN KEY (event_id) REFERENCES Event (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_27B1FD2A71F7E88B ON EventRequest (event_id)');
        $this->addSql('CREATE TABLE MenuItem (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, description CLOB DEFAULT NULL, image CLOB DEFAULT NULL, categorie_id INTEGER DEFAULT NULL, CONSTRAINT FK_93953FBEBCF5E72D FOREIGN KEY (categorie_id) REFERENCES Categorie (id) ON DELETE SET NULL NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_93953FBEBCF5E72D ON MenuItem (categorie_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE Categorie');
        $this->addSql('DROP TABLE Event');
        $this->addSql('DROP TABLE EventRequest');
        $this->addSql('DROP TABLE MenuItem');
    }
}
