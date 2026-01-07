<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260107122250 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE MenuItem ADD COLUMN available BOOLEAN DEFAULT 1 NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__MenuItem AS SELECT id, name, price, description, image, fidelityPoints, categorie_id FROM MenuItem');
        $this->addSql('DROP TABLE MenuItem');
        $this->addSql('CREATE TABLE MenuItem (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, description CLOB DEFAULT NULL, image CLOB DEFAULT NULL, fidelityPoints INTEGER DEFAULT NULL, categorie_id INTEGER DEFAULT NULL, CONSTRAINT FK_93953FBEBCF5E72D FOREIGN KEY (categorie_id) REFERENCES Categorie (id) ON DELETE SET NULL NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO MenuItem (id, name, price, description, image, fidelityPoints, categorie_id) SELECT id, name, price, description, image, fidelityPoints, categorie_id FROM __temp__MenuItem');
        $this->addSql('DROP TABLE __temp__MenuItem');
        $this->addSql('CREATE INDEX IDX_93953FBEBCF5E72D ON MenuItem (categorie_id)');
    }
}
