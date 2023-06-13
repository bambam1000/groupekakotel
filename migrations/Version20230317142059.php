<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230317142059 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE footer ADD logo_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE footer ADD CONSTRAINT FK_E2310553F98F144A FOREIGN KEY (logo_id) REFERENCES logo (id)');
        $this->addSql('CREATE INDEX IDX_E2310553F98F144A ON footer (logo_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE footer DROP FOREIGN KEY FK_E2310553F98F144A');
        $this->addSql('DROP INDEX IDX_E2310553F98F144A ON footer');
        $this->addSql('ALTER TABLE footer DROP logo_id');
    }
}
