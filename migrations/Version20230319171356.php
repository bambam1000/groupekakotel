<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230319171356 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE actualite_categories (actualite_id INT NOT NULL, categories_id INT NOT NULL, INDEX IDX_955CA77CA2843073 (actualite_id), INDEX IDX_955CA77CA21214B7 (categories_id), PRIMARY KEY(actualite_id, categories_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE section_categories (section_id INT NOT NULL, categories_id INT NOT NULL, INDEX IDX_A7437CB7D823E37A (section_id), INDEX IDX_A7437CB7A21214B7 (categories_id), PRIMARY KEY(section_id, categories_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE actualite_categories ADD CONSTRAINT FK_955CA77CA2843073 FOREIGN KEY (actualite_id) REFERENCES actualite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE actualite_categories ADD CONSTRAINT FK_955CA77CA21214B7 FOREIGN KEY (categories_id) REFERENCES categories (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE section_categories ADD CONSTRAINT FK_A7437CB7D823E37A FOREIGN KEY (section_id) REFERENCES section (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE section_categories ADD CONSTRAINT FK_A7437CB7A21214B7 FOREIGN KEY (categories_id) REFERENCES categories (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE actualite_categories DROP FOREIGN KEY FK_955CA77CA2843073');
        $this->addSql('ALTER TABLE actualite_categories DROP FOREIGN KEY FK_955CA77CA21214B7');
        $this->addSql('ALTER TABLE section_categories DROP FOREIGN KEY FK_A7437CB7D823E37A');
        $this->addSql('ALTER TABLE section_categories DROP FOREIGN KEY FK_A7437CB7A21214B7');
        $this->addSql('DROP TABLE actualite_categories');
        $this->addSql('DROP TABLE section_categories');
    }
}
