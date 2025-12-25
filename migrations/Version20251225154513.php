<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251225154513 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE EventRequest ADD COLUMN visibility VARCHAR(50) DEFAULT \'public\' NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__EventRequest AS SELECT id, name, message, image, created, event_id FROM EventRequest');
        $this->addSql('DROP TABLE EventRequest');
        $this->addSql('CREATE TABLE EventRequest (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, message CLOB DEFAULT NULL, image CLOB DEFAULT NULL, created DATETIME NOT NULL, event_id INTEGER DEFAULT NULL, CONSTRAINT FK_27B1FD2A71F7E88B FOREIGN KEY (event_id) REFERENCES Event (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO EventRequest (id, name, message, image, created, event_id) SELECT id, name, message, image, created, event_id FROM __temp__EventRequest');
        $this->addSql('DROP TABLE __temp__EventRequest');
        $this->addSql('CREATE INDEX IDX_27B1FD2A71F7E88B ON EventRequest (event_id)');
    }
}
