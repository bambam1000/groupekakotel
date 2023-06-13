<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230317194857 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE actualite ADD icon VARCHAR(255) DEFAULT NULL, ADD chapeau_fr VARCHAR(255) DEFAULT NULL, ADD chapeau_ang VARCHAR(255) DEFAULT NULL, ADD phrase1_fr VARCHAR(255) DEFAULT NULL, ADD phrase1_ang VARCHAR(255) DEFAULT NULL, ADD phrase2_fr VARCHAR(255) DEFAULT NULL, ADD phrase2_ang VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE actualite DROP icon, DROP chapeau_fr, DROP chapeau_ang, DROP phrase1_fr, DROP phrase1_ang, DROP phrase2_fr, DROP phrase2_ang');
    }
}
