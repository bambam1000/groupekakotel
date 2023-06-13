<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230320130133 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE iplan_actualite (id INT AUTO_INCREMENT NOT NULL, iplanimage_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, titre_fr VARCHAR(255) DEFAULT NULL, titre_ang VARCHAR(255) DEFAULT NULL, chapeau_fr VARCHAR(255) DEFAULT NULL, chapeau_ang VARCHAR(255) DEFAULT NULL, content_fr LONGTEXT DEFAULT NULL, content_ang LONGTEXT DEFAULT NULL, icon VARCHAR(255) DEFAULT NULL, categorie VARCHAR(255) NOT NULL, INDEX IDX_D668542EA95DC43 (iplanimage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE iplan_image (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, alt_text VARCHAR(255) DEFAULT NULL, filename VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE iplan_menus (id INT AUTO_INCREMENT NOT NULL, nom_fr VARCHAR(255) DEFAULT NULL, nom_ang VARCHAR(255) DEFAULT NULL, slug VARCHAR(255) NOT NULL, link VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE iplan_menus_iplan_sousmenus (iplan_menus_id INT NOT NULL, iplan_sousmenus_id INT NOT NULL, INDEX IDX_17AA38CE62563D2 (iplan_menus_id), INDEX IDX_17AA38C28ED6DF1 (iplan_sousmenus_id), PRIMARY KEY(iplan_menus_id, iplan_sousmenus_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE iplan_section (id INT AUTO_INCREMENT NOT NULL, iplanimage_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, titre_fr VARCHAR(255) DEFAULT NULL, titre_ang VARCHAR(255) DEFAULT NULL, paragraphe_fr VARCHAR(255) DEFAULT NULL, paragraphe_ang VARCHAR(255) DEFAULT NULL, content_fr LONGTEXT DEFAULT NULL, content_ang LONGTEXT DEFAULT NULL, categorie VARCHAR(255) NOT NULL, INDEX IDX_6E0B62BCA95DC43 (iplanimage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE iplan_section_iplan_actualite (iplan_section_id INT NOT NULL, iplan_actualite_id INT NOT NULL, INDEX IDX_F0E1D16C6A1C1287 (iplan_section_id), INDEX IDX_F0E1D16CC92CDF36 (iplan_actualite_id), PRIMARY KEY(iplan_section_id, iplan_actualite_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE iplan_sousmenus (id INT AUTO_INCREMENT NOT NULL, nom_fr VARCHAR(255) DEFAULT NULL, nom_ang VARCHAR(255) DEFAULT NULL, slug VARCHAR(255) NOT NULL, link VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE iplanfooter (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, titre1_fr VARCHAR(255) DEFAULT NULL, titre1_ang VARCHAR(255) DEFAULT NULL, titre2_fr VARCHAR(255) DEFAULT NULL, titre2_ang VARCHAR(255) DEFAULT NULL, titre3_fr VARCHAR(255) DEFAULT NULL, titre3_ang VARCHAR(255) DEFAULT NULL, titre4_fr VARCHAR(255) DEFAULT NULL, titre4_ang VARCHAR(255) DEFAULT NULL, paragraphe_fr VARCHAR(255) DEFAULT NULL, paragraphe_ang VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE iplanfooter_iplan_menus (iplanfooter_id INT NOT NULL, iplan_menus_id INT NOT NULL, INDEX IDX_F671643CF8F39C72 (iplanfooter_id), INDEX IDX_F671643CE62563D2 (iplan_menus_id), PRIMARY KEY(iplanfooter_id, iplan_menus_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE iplanfooter_iplan_sousmenus (iplanfooter_id INT NOT NULL, iplan_sousmenus_id INT NOT NULL, INDEX IDX_FAFA2FA8F8F39C72 (iplanfooter_id), INDEX IDX_FAFA2FA828ED6DF1 (iplan_sousmenus_id), PRIMARY KEY(iplanfooter_id, iplan_sousmenus_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE iplanheader (id INT AUTO_INCREMENT NOT NULL, iplanlogo_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, email VARCHAR(255) DEFAULT NULL, contact VARCHAR(255) DEFAULT NULL, INDEX IDX_14787086114DCAA1 (iplanlogo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE iplanheader_iplan_menus (iplanheader_id INT NOT NULL, iplan_menus_id INT NOT NULL, INDEX IDX_B990C008F21822EE (iplanheader_id), INDEX IDX_B990C008E62563D2 (iplan_menus_id), PRIMARY KEY(iplanheader_id, iplan_menus_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE iplanlogo (id INT AUTO_INCREMENT NOT NULL, iplanimage_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_D6EFC48CA95DC43 (iplanimage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE iplanpage (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE iplanpage_iplan_section (iplanpage_id INT NOT NULL, iplan_section_id INT NOT NULL, INDEX IDX_7C199C84E484BD0F (iplanpage_id), INDEX IDX_7C199C846A1C1287 (iplan_section_id), PRIMARY KEY(iplanpage_id, iplan_section_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE iplan_actualite ADD CONSTRAINT FK_D668542EA95DC43 FOREIGN KEY (iplanimage_id) REFERENCES iplan_image (id)');
        $this->addSql('ALTER TABLE iplan_menus_iplan_sousmenus ADD CONSTRAINT FK_17AA38CE62563D2 FOREIGN KEY (iplan_menus_id) REFERENCES iplan_menus (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE iplan_menus_iplan_sousmenus ADD CONSTRAINT FK_17AA38C28ED6DF1 FOREIGN KEY (iplan_sousmenus_id) REFERENCES iplan_sousmenus (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE iplan_section ADD CONSTRAINT FK_6E0B62BCA95DC43 FOREIGN KEY (iplanimage_id) REFERENCES iplan_image (id)');
        $this->addSql('ALTER TABLE iplan_section_iplan_actualite ADD CONSTRAINT FK_F0E1D16C6A1C1287 FOREIGN KEY (iplan_section_id) REFERENCES iplan_section (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE iplan_section_iplan_actualite ADD CONSTRAINT FK_F0E1D16CC92CDF36 FOREIGN KEY (iplan_actualite_id) REFERENCES iplan_actualite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE iplanfooter_iplan_menus ADD CONSTRAINT FK_F671643CF8F39C72 FOREIGN KEY (iplanfooter_id) REFERENCES iplanfooter (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE iplanfooter_iplan_menus ADD CONSTRAINT FK_F671643CE62563D2 FOREIGN KEY (iplan_menus_id) REFERENCES iplan_menus (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE iplanfooter_iplan_sousmenus ADD CONSTRAINT FK_FAFA2FA8F8F39C72 FOREIGN KEY (iplanfooter_id) REFERENCES iplanfooter (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE iplanfooter_iplan_sousmenus ADD CONSTRAINT FK_FAFA2FA828ED6DF1 FOREIGN KEY (iplan_sousmenus_id) REFERENCES iplan_sousmenus (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE iplanheader ADD CONSTRAINT FK_14787086114DCAA1 FOREIGN KEY (iplanlogo_id) REFERENCES iplanlogo (id)');
        $this->addSql('ALTER TABLE iplanheader_iplan_menus ADD CONSTRAINT FK_B990C008F21822EE FOREIGN KEY (iplanheader_id) REFERENCES iplanheader (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE iplanheader_iplan_menus ADD CONSTRAINT FK_B990C008E62563D2 FOREIGN KEY (iplan_menus_id) REFERENCES iplan_menus (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE iplanlogo ADD CONSTRAINT FK_D6EFC48CA95DC43 FOREIGN KEY (iplanimage_id) REFERENCES iplan_image (id)');
        $this->addSql('ALTER TABLE iplanpage_iplan_section ADD CONSTRAINT FK_7C199C84E484BD0F FOREIGN KEY (iplanpage_id) REFERENCES iplanpage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE iplanpage_iplan_section ADD CONSTRAINT FK_7C199C846A1C1287 FOREIGN KEY (iplan_section_id) REFERENCES iplan_section (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE iplan_actualite DROP FOREIGN KEY FK_D668542EA95DC43');
        $this->addSql('ALTER TABLE iplan_menus_iplan_sousmenus DROP FOREIGN KEY FK_17AA38CE62563D2');
        $this->addSql('ALTER TABLE iplan_menus_iplan_sousmenus DROP FOREIGN KEY FK_17AA38C28ED6DF1');
        $this->addSql('ALTER TABLE iplan_section DROP FOREIGN KEY FK_6E0B62BCA95DC43');
        $this->addSql('ALTER TABLE iplan_section_iplan_actualite DROP FOREIGN KEY FK_F0E1D16C6A1C1287');
        $this->addSql('ALTER TABLE iplan_section_iplan_actualite DROP FOREIGN KEY FK_F0E1D16CC92CDF36');
        $this->addSql('ALTER TABLE iplanfooter_iplan_menus DROP FOREIGN KEY FK_F671643CF8F39C72');
        $this->addSql('ALTER TABLE iplanfooter_iplan_menus DROP FOREIGN KEY FK_F671643CE62563D2');
        $this->addSql('ALTER TABLE iplanfooter_iplan_sousmenus DROP FOREIGN KEY FK_FAFA2FA8F8F39C72');
        $this->addSql('ALTER TABLE iplanfooter_iplan_sousmenus DROP FOREIGN KEY FK_FAFA2FA828ED6DF1');
        $this->addSql('ALTER TABLE iplanheader DROP FOREIGN KEY FK_14787086114DCAA1');
        $this->addSql('ALTER TABLE iplanheader_iplan_menus DROP FOREIGN KEY FK_B990C008F21822EE');
        $this->addSql('ALTER TABLE iplanheader_iplan_menus DROP FOREIGN KEY FK_B990C008E62563D2');
        $this->addSql('ALTER TABLE iplanlogo DROP FOREIGN KEY FK_D6EFC48CA95DC43');
        $this->addSql('ALTER TABLE iplanpage_iplan_section DROP FOREIGN KEY FK_7C199C84E484BD0F');
        $this->addSql('ALTER TABLE iplanpage_iplan_section DROP FOREIGN KEY FK_7C199C846A1C1287');
        $this->addSql('DROP TABLE iplan_actualite');
        $this->addSql('DROP TABLE iplan_image');
        $this->addSql('DROP TABLE iplan_menus');
        $this->addSql('DROP TABLE iplan_menus_iplan_sousmenus');
        $this->addSql('DROP TABLE iplan_section');
        $this->addSql('DROP TABLE iplan_section_iplan_actualite');
        $this->addSql('DROP TABLE iplan_sousmenus');
        $this->addSql('DROP TABLE iplanfooter');
        $this->addSql('DROP TABLE iplanfooter_iplan_menus');
        $this->addSql('DROP TABLE iplanfooter_iplan_sousmenus');
        $this->addSql('DROP TABLE iplanheader');
        $this->addSql('DROP TABLE iplanheader_iplan_menus');
        $this->addSql('DROP TABLE iplanlogo');
        $this->addSql('DROP TABLE iplanpage');
        $this->addSql('DROP TABLE iplanpage_iplan_section');
    }
}
