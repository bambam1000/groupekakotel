<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230317123215 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE pages (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pages_section (pages_id INT NOT NULL, section_id INT NOT NULL, INDEX IDX_BD61ED05401ADD27 (pages_id), INDEX IDX_BD61ED05D823E37A (section_id), PRIMARY KEY(pages_id, section_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pages_section ADD CONSTRAINT FK_BD61ED05401ADD27 FOREIGN KEY (pages_id) REFERENCES pages (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pages_section ADD CONSTRAINT FK_BD61ED05D823E37A FOREIGN KEY (section_id) REFERENCES section (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pages_section DROP FOREIGN KEY FK_BD61ED05401ADD27');
        $this->addSql('ALTER TABLE pages_section DROP FOREIGN KEY FK_BD61ED05D823E37A');
        $this->addSql('DROP TABLE pages');
        $this->addSql('DROP TABLE pages_section');
    }
}
