<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230404204126 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE iplanheader ADD logo_iplan_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE iplanheader ADD CONSTRAINT FK_147870868F42E2CA FOREIGN KEY (logo_iplan_id) REFERENCES iplan_image (id)');
        $this->addSql('CREATE INDEX IDX_147870868F42E2CA ON iplanheader (logo_iplan_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE iplanheader DROP FOREIGN KEY FK_147870868F42E2CA');
        $this->addSql('DROP INDEX IDX_147870868F42E2CA ON iplanheader');
        $this->addSql('ALTER TABLE iplanheader DROP logo_iplan_id');
    }
}
