<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230407142313 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE iplansu_header ADD logo_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE iplansu_header ADD CONSTRAINT FK_1D5BD940F98F144A FOREIGN KEY (logo_id) REFERENCES iplansu_logo (id)');
        $this->addSql('CREATE INDEX IDX_1D5BD940F98F144A ON iplansu_header (logo_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE iplansu_header DROP FOREIGN KEY FK_1D5BD940F98F144A');
        $this->addSql('DROP INDEX IDX_1D5BD940F98F144A ON iplansu_header');
        $this->addSql('ALTER TABLE iplansu_header DROP logo_id');
    }
}
