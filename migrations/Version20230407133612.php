<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230407133612 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE iplansu_actualite (id INT AUTO_INCREMENT NOT NULL, image_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, titre_fr VARCHAR(255) DEFAULT NULL, titre_ang VARCHAR(255) DEFAULT NULL, slug VARCHAR(255) NOT NULL, chapeau_fr VARCHAR(255) DEFAULT NULL, chapeau_ang VARCHAR(255) DEFAULT NULL, content_fr LONGTEXT DEFAULT NULL, content_ang LONGTEXT DEFAULT NULL, icon VARCHAR(255) DEFAULT NULL, categorie VARCHAR(255) NOT NULL, INDEX IDX_C0F320883DA5256D (image_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE iplansu_footer (id INT AUTO_INCREMENT NOT NULL, titre_1 VARCHAR(255) DEFAULT NULL, titre_2fr VARCHAR(255) DEFAULT NULL, titre_2ang VARCHAR(255) DEFAULT NULL, titre_3fr VARCHAR(255) DEFAULT NULL, titre_3ang VARCHAR(255) DEFAULT NULL, titre_4fr VARCHAR(255) DEFAULT NULL, titre_4ang VARCHAR(255) DEFAULT NULL, paragraphe_fr VARCHAR(255) DEFAULT NULL, paragraphe_ang VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE iplansu_footer_iplansu_menus (iplansu_footer_id INT NOT NULL, iplansu_menus_id INT NOT NULL, INDEX IDX_5940930B073005B (iplansu_footer_id), INDEX IDX_5940930119E800D (iplansu_menus_id), PRIMARY KEY(iplansu_footer_id, iplansu_menus_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE iplansu_footer_iplansu_sousmenus (iplansu_footer_id INT NOT NULL, iplansu_sousmenus_id INT NOT NULL, INDEX IDX_F79E6C6CB073005B (iplansu_footer_id), INDEX IDX_F79E6C6CD996BA0B (iplansu_sousmenus_id), PRIMARY KEY(iplansu_footer_id, iplansu_sousmenus_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE iplansu_header (id INT AUTO_INCREMENT NOT NULL, contact VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE iplansu_header_iplansu_menus (iplansu_header_id INT NOT NULL, iplansu_menus_id INT NOT NULL, INDEX IDX_6F05D2D7BA98BEC7 (iplansu_header_id), INDEX IDX_6F05D2D7119E800D (iplansu_menus_id), PRIMARY KEY(iplansu_header_id, iplansu_menus_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE iplansu_image (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, alt_text VARCHAR(255) DEFAULT NULL, filename VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE iplansu_logo (id INT AUTO_INCREMENT NOT NULL, image_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_8C484A443DA5256D (image_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE iplansu_menus (id INT AUTO_INCREMENT NOT NULL, nom_fr VARCHAR(255) DEFAULT NULL, nom_ang VARCHAR(255) DEFAULT NULL, slug VARCHAR(255) NOT NULL, link VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE iplansu_menus_iplansu_sousmenus (iplansu_menus_id INT NOT NULL, iplansu_sousmenus_id INT NOT NULL, INDEX IDX_D268D40E119E800D (iplansu_menus_id), INDEX IDX_D268D40ED996BA0B (iplansu_sousmenus_id), PRIMARY KEY(iplansu_menus_id, iplansu_sousmenus_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE iplansu_page (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE iplansu_page_iplansu_section (iplansu_page_id INT NOT NULL, iplansu_section_id INT NOT NULL, INDEX IDX_404E91F8968AF923 (iplansu_page_id), INDEX IDX_404E91F855BF8F2E (iplansu_section_id), PRIMARY KEY(iplansu_page_id, iplansu_section_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE iplansu_section (id INT AUTO_INCREMENT NOT NULL, image_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, titre_fr VARCHAR(255) DEFAULT NULL, titre_ang VARCHAR(255) DEFAULT NULL, paragraphe_fr VARCHAR(255) DEFAULT NULL, paragraphe_ang VARCHAR(255) DEFAULT NULL, content_fr LONGTEXT DEFAULT NULL, content_ang LONGTEXT DEFAULT NULL, categorie VARCHAR(255) NOT NULL, lien_fr VARCHAR(255) DEFAULT NULL, lien_ang VARCHAR(255) DEFAULT NULL, url VARCHAR(255) DEFAULT NULL, INDEX IDX_B7BFE0283DA5256D (image_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE iplansu_section_iplansu_actualite (iplansu_section_id INT NOT NULL, iplansu_actualite_id INT NOT NULL, INDEX IDX_B5068DEF55BF8F2E (iplansu_section_id), INDEX IDX_B5068DEF385708CC (iplansu_actualite_id), PRIMARY KEY(iplansu_section_id, iplansu_actualite_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE iplansu_sousmenus (id INT AUTO_INCREMENT NOT NULL, nom_fr VARCHAR(255) DEFAULT NULL, nom_ang VARCHAR(255) DEFAULT NULL, slug VARCHAR(255) NOT NULL, link VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE iplansu_actualite ADD CONSTRAINT FK_C0F320883DA5256D FOREIGN KEY (image_id) REFERENCES iplansu_image (id)');
        $this->addSql('ALTER TABLE iplansu_footer_iplansu_menus ADD CONSTRAINT FK_5940930B073005B FOREIGN KEY (iplansu_footer_id) REFERENCES iplansu_footer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE iplansu_footer_iplansu_menus ADD CONSTRAINT FK_5940930119E800D FOREIGN KEY (iplansu_menus_id) REFERENCES iplansu_menus (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE iplansu_footer_iplansu_sousmenus ADD CONSTRAINT FK_F79E6C6CB073005B FOREIGN KEY (iplansu_footer_id) REFERENCES iplansu_footer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE iplansu_footer_iplansu_sousmenus ADD CONSTRAINT FK_F79E6C6CD996BA0B FOREIGN KEY (iplansu_sousmenus_id) REFERENCES iplansu_sousmenus (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE iplansu_header_iplansu_menus ADD CONSTRAINT FK_6F05D2D7BA98BEC7 FOREIGN KEY (iplansu_header_id) REFERENCES iplansu_header (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE iplansu_header_iplansu_menus ADD CONSTRAINT FK_6F05D2D7119E800D FOREIGN KEY (iplansu_menus_id) REFERENCES iplansu_menus (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE iplansu_logo ADD CONSTRAINT FK_8C484A443DA5256D FOREIGN KEY (image_id) REFERENCES iplansu_image (id)');
        $this->addSql('ALTER TABLE iplansu_menus_iplansu_sousmenus ADD CONSTRAINT FK_D268D40E119E800D FOREIGN KEY (iplansu_menus_id) REFERENCES iplansu_menus (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE iplansu_menus_iplansu_sousmenus ADD CONSTRAINT FK_D268D40ED996BA0B FOREIGN KEY (iplansu_sousmenus_id) REFERENCES iplansu_sousmenus (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE iplansu_page_iplansu_section ADD CONSTRAINT FK_404E91F8968AF923 FOREIGN KEY (iplansu_page_id) REFERENCES iplansu_page (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE iplansu_page_iplansu_section ADD CONSTRAINT FK_404E91F855BF8F2E FOREIGN KEY (iplansu_section_id) REFERENCES iplansu_section (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE iplansu_section ADD CONSTRAINT FK_B7BFE0283DA5256D FOREIGN KEY (image_id) REFERENCES iplansu_image (id)');
        $this->addSql('ALTER TABLE iplansu_section_iplansu_actualite ADD CONSTRAINT FK_B5068DEF55BF8F2E FOREIGN KEY (iplansu_section_id) REFERENCES iplansu_section (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE iplansu_section_iplansu_actualite ADD CONSTRAINT FK_B5068DEF385708CC FOREIGN KEY (iplansu_actualite_id) REFERENCES iplansu_actualite (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE iplansu_actualite DROP FOREIGN KEY FK_C0F320883DA5256D');
        $this->addSql('ALTER TABLE iplansu_footer_iplansu_menus DROP FOREIGN KEY FK_5940930B073005B');
        $this->addSql('ALTER TABLE iplansu_footer_iplansu_menus DROP FOREIGN KEY FK_5940930119E800D');
        $this->addSql('ALTER TABLE iplansu_footer_iplansu_sousmenus DROP FOREIGN KEY FK_F79E6C6CB073005B');
        $this->addSql('ALTER TABLE iplansu_footer_iplansu_sousmenus DROP FOREIGN KEY FK_F79E6C6CD996BA0B');
        $this->addSql('ALTER TABLE iplansu_header_iplansu_menus DROP FOREIGN KEY FK_6F05D2D7BA98BEC7');
        $this->addSql('ALTER TABLE iplansu_header_iplansu_menus DROP FOREIGN KEY FK_6F05D2D7119E800D');
        $this->addSql('ALTER TABLE iplansu_logo DROP FOREIGN KEY FK_8C484A443DA5256D');
        $this->addSql('ALTER TABLE iplansu_menus_iplansu_sousmenus DROP FOREIGN KEY FK_D268D40E119E800D');
        $this->addSql('ALTER TABLE iplansu_menus_iplansu_sousmenus DROP FOREIGN KEY FK_D268D40ED996BA0B');
        $this->addSql('ALTER TABLE iplansu_page_iplansu_section DROP FOREIGN KEY FK_404E91F8968AF923');
        $this->addSql('ALTER TABLE iplansu_page_iplansu_section DROP FOREIGN KEY FK_404E91F855BF8F2E');
        $this->addSql('ALTER TABLE iplansu_section DROP FOREIGN KEY FK_B7BFE0283DA5256D');
        $this->addSql('ALTER TABLE iplansu_section_iplansu_actualite DROP FOREIGN KEY FK_B5068DEF55BF8F2E');
        $this->addSql('ALTER TABLE iplansu_section_iplansu_actualite DROP FOREIGN KEY FK_B5068DEF385708CC');
        $this->addSql('DROP TABLE iplansu_actualite');
        $this->addSql('DROP TABLE iplansu_footer');
        $this->addSql('DROP TABLE iplansu_footer_iplansu_menus');
        $this->addSql('DROP TABLE iplansu_footer_iplansu_sousmenus');
        $this->addSql('DROP TABLE iplansu_header');
        $this->addSql('DROP TABLE iplansu_header_iplansu_menus');
        $this->addSql('DROP TABLE iplansu_image');
        $this->addSql('DROP TABLE iplansu_logo');
        $this->addSql('DROP TABLE iplansu_menus');
        $this->addSql('DROP TABLE iplansu_menus_iplansu_sousmenus');
        $this->addSql('DROP TABLE iplansu_page');
        $this->addSql('DROP TABLE iplansu_page_iplansu_section');
        $this->addSql('DROP TABLE iplansu_section');
        $this->addSql('DROP TABLE iplansu_section_iplansu_actualite');
        $this->addSql('DROP TABLE iplansu_sousmenus');
    }
}
