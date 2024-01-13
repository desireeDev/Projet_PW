<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240113135115 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE educateur (id INT AUTO_INCREMENT NOT NULL, email_educateur VARCHAR(30) NOT NULL, mdp_educateur VARCHAR(50) NOT NULL, administrateur TINYINT(1) NOT NULL, id_licencie VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mail_contact (id INT AUTO_INCREMENT NOT NULL, expediteur_id INT NOT NULL, date_envoi DATETIME NOT NULL, objet VARCHAR(255) NOT NULL, message VARCHAR(255) NOT NULL, INDEX IDX_96DF675710335F61 (expediteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mail_educateur_contact (mail_contact_id INT NOT NULL, contact_id INT NOT NULL, INDEX IDX_33A66FEF3362CFB6 (mail_contact_id), INDEX IDX_33A66FEFE7A1254A (contact_id), PRIMARY KEY(mail_contact_id, contact_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mail_educateur (id INT AUTO_INCREMENT NOT NULL, expediteur_id INT DEFAULT NULL, date_envoi DATETIME NOT NULL, objet VARCHAR(255) NOT NULL, message VARCHAR(255) NOT NULL, INDEX IDX_EE61F4110335F61 (expediteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mail_educateur_educateur (mail_educateur_id INT NOT NULL, educateur_id INT NOT NULL, INDEX IDX_2C2116BA932A6B1A (mail_educateur_id), INDEX IDX_2C2116BA6BFC1A0E (educateur_id), PRIMARY KEY(mail_educateur_id, educateur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE mail_contact ADD CONSTRAINT FK_96DF675710335F61 FOREIGN KEY (expediteur_id) REFERENCES educateur (id)');
        $this->addSql('ALTER TABLE mail_educateur_contact ADD CONSTRAINT FK_33A66FEF3362CFB6 FOREIGN KEY (mail_contact_id) REFERENCES mail_contact (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mail_educateur_contact ADD CONSTRAINT FK_33A66FEFE7A1254A FOREIGN KEY (contact_id) REFERENCES contact (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mail_educateur ADD CONSTRAINT FK_EE61F4110335F61 FOREIGN KEY (expediteur_id) REFERENCES educateur (id)');
        $this->addSql('ALTER TABLE mail_educateur_educateur ADD CONSTRAINT FK_2C2116BA932A6B1A FOREIGN KEY (mail_educateur_id) REFERENCES mail_educateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mail_educateur_educateur ADD CONSTRAINT FK_2C2116BA6BFC1A0E FOREIGN KEY (educateur_id) REFERENCES educateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE educateurs DROP FOREIGN KEY fk_Educateur_Licencie');
        $this->addSql('DROP TABLE educateurs');
        $this->addSql('DROP INDEX Code_Raccourci ON categories');
        $this->addSql('DROP INDEX Code_Raccourci_2 ON categories');
        $this->addSql('DROP INDEX Code_Raccourci_3 ON categories');
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY fk_Contact_Licencie');
        $this->addSql('DROP INDEX fk_Contact_Licencie ON contact');
        $this->addSql('ALTER TABLE contact CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE id_licencie id_licencie VARCHAR(11) NOT NULL');
        $this->addSql('ALTER TABLE licencies DROP FOREIGN KEY fk_Licencie_Categories');
        $this->addSql('DROP INDEX fk_Licencie_Categories ON licencies');
        $this->addSql('ALTER TABLE licencies CHANGE id_cat id_cat VARCHAR(30) NOT NULL, CHANGE Prenom_Licencie prenom_licencie VARCHAR(39) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE educateurs (id INT AUTO_INCREMENT NOT NULL, id_licencie INT DEFAULT NULL, Email_Educateur VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, Mdp_Educateur VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, Administrateur TINYINT(1) NOT NULL, UNIQUE INDEX Email_Educateur (Email_Educateur), INDEX fk_Educateur_Licencie (id_licencie), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE educateurs ADD CONSTRAINT fk_Educateur_Licencie FOREIGN KEY (id_licencie) REFERENCES licencies (id)');
        $this->addSql('ALTER TABLE mail_contact DROP FOREIGN KEY FK_96DF675710335F61');
        $this->addSql('ALTER TABLE mail_educateur_contact DROP FOREIGN KEY FK_33A66FEF3362CFB6');
        $this->addSql('ALTER TABLE mail_educateur_contact DROP FOREIGN KEY FK_33A66FEFE7A1254A');
        $this->addSql('ALTER TABLE mail_educateur DROP FOREIGN KEY FK_EE61F4110335F61');
        $this->addSql('ALTER TABLE mail_educateur_educateur DROP FOREIGN KEY FK_2C2116BA932A6B1A');
        $this->addSql('ALTER TABLE mail_educateur_educateur DROP FOREIGN KEY FK_2C2116BA6BFC1A0E');
        $this->addSql('DROP TABLE educateur');
        $this->addSql('DROP TABLE mail_contact');
        $this->addSql('DROP TABLE mail_educateur_contact');
        $this->addSql('DROP TABLE mail_educateur');
        $this->addSql('DROP TABLE mail_educateur_educateur');
        $this->addSql('CREATE UNIQUE INDEX Code_Raccourci ON categories (Code_Raccourci)');
        $this->addSql('CREATE UNIQUE INDEX Code_Raccourci_2 ON categories (Code_Raccourci)');
        $this->addSql('CREATE UNIQUE INDEX Code_Raccourci_3 ON categories (Code_Raccourci)');
        $this->addSql('ALTER TABLE contact CHANGE id id VARCHAR(50) NOT NULL, CHANGE id_licencie id_licencie INT DEFAULT NULL');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT fk_Contact_Licencie FOREIGN KEY (id_licencie) REFERENCES licencies (id)');
        $this->addSql('CREATE INDEX fk_Contact_Licencie ON contact (id_licencie)');
        $this->addSql('ALTER TABLE licencies CHANGE prenom_licencie Prenom_Licencie VARCHAR(30) NOT NULL, CHANGE id_cat id_cat INT DEFAULT NULL');
        $this->addSql('ALTER TABLE licencies ADD CONSTRAINT fk_Licencie_Categories FOREIGN KEY (id_cat) REFERENCES categories (id)');
        $this->addSql('CREATE INDEX fk_Licencie_Categories ON licencies (id_cat)');
    }
}
