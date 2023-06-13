<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230317112145 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE actualite (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, lien VARCHAR(255) DEFAULT NULL, lien_ang VARCHAR(255) DEFAULT NULL, url VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE footer (id INT AUTO_INCREMENT NOT NULL, phrase VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE header (id INT AUTO_INCREMENT NOT NULL, logo_id INT DEFAULT NULL, INDEX IDX_6E72A8C1F98F144A (logo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE header_menus (header_id INT NOT NULL, menus_id INT NOT NULL, INDEX IDX_E1D173282EF91FD8 (header_id), INDEX IDX_E1D1732814041B84 (menus_id), PRIMARY KEY(header_id, menus_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE logo (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menus (id INT AUTO_INCREMENT NOT NULL, nom_fr VARCHAR(255) DEFAULT NULL, nom_ang VARCHAR(255) DEFAULT NULL, slug VARCHAR(255) NOT NULL, link VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menus_sousmenus (menus_id INT NOT NULL, sousmenus_id INT NOT NULL, INDEX IDX_41EA2E4714041B84 (menus_id), INDEX IDX_41EA2E47434582B4 (sousmenus_id), PRIMARY KEY(menus_id, sousmenus_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE section (id INT AUTO_INCREMENT NOT NULL, nom_fr VARCHAR(255) DEFAULT NULL, nom_ang VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE section_actualite (section_id INT NOT NULL, actualite_id INT NOT NULL, INDEX IDX_36DFF112D823E37A (section_id), INDEX IDX_36DFF112A2843073 (actualite_id), PRIMARY KEY(section_id, actualite_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sousmenus (id INT AUTO_INCREMENT NOT NULL, nom_fr VARCHAR(255) DEFAULT NULL, nom_ang VARCHAR(255) DEFAULT NULL, slug VARCHAR(255) NOT NULL, link VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE header ADD CONSTRAINT FK_6E72A8C1F98F144A FOREIGN KEY (logo_id) REFERENCES logo (id)');
        $this->addSql('ALTER TABLE header_menus ADD CONSTRAINT FK_E1D173282EF91FD8 FOREIGN KEY (header_id) REFERENCES header (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE header_menus ADD CONSTRAINT FK_E1D1732814041B84 FOREIGN KEY (menus_id) REFERENCES menus (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE menus_sousmenus ADD CONSTRAINT FK_41EA2E4714041B84 FOREIGN KEY (menus_id) REFERENCES menus (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE menus_sousmenus ADD CONSTRAINT FK_41EA2E47434582B4 FOREIGN KEY (sousmenus_id) REFERENCES sousmenus (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE section_actualite ADD CONSTRAINT FK_36DFF112D823E37A FOREIGN KEY (section_id) REFERENCES section (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE section_actualite ADD CONSTRAINT FK_36DFF112A2843073 FOREIGN KEY (actualite_id) REFERENCES actualite (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE header DROP FOREIGN KEY FK_6E72A8C1F98F144A');
        $this->addSql('ALTER TABLE header_menus DROP FOREIGN KEY FK_E1D173282EF91FD8');
        $this->addSql('ALTER TABLE header_menus DROP FOREIGN KEY FK_E1D1732814041B84');
        $this->addSql('ALTER TABLE menus_sousmenus DROP FOREIGN KEY FK_41EA2E4714041B84');
        $this->addSql('ALTER TABLE menus_sousmenus DROP FOREIGN KEY FK_41EA2E47434582B4');
        $this->addSql('ALTER TABLE section_actualite DROP FOREIGN KEY FK_36DFF112D823E37A');
        $this->addSql('ALTER TABLE section_actualite DROP FOREIGN KEY FK_36DFF112A2843073');
        $this->addSql('DROP TABLE actualite');
        $this->addSql('DROP TABLE footer');
        $this->addSql('DROP TABLE header');
        $this->addSql('DROP TABLE header_menus');
        $this->addSql('DROP TABLE logo');
        $this->addSql('DROP TABLE menus');
        $this->addSql('DROP TABLE menus_sousmenus');
        $this->addSql('DROP TABLE section');
        $this->addSql('DROP TABLE section_actualite');
        $this->addSql('DROP TABLE sousmenus');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
