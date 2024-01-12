<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240112125306 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE mail_contact (id INT AUTO_INCREMENT NOT NULL, date_envoi VARCHAR(50) NOT NULL, objet VARCHAR(50) NOT NULL, message VARCHAR(255) NOT NULL, contact_licencie VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mail_edu (id INT AUTO_INCREMENT NOT NULL, date_envoi VARCHAR(50) NOT NULL, objet VARCHAR(50) NOT NULL, message VARCHAR(255) NOT NULL, destinataire VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE categories ADD id INT AUTO_INCREMENT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('DROP INDEX Num_Licence ON contact');
        $this->addSql('DROP INDEX Num_Licencie ON contact');
        $this->addSql('ALTER TABLE contact ADD id INT AUTO_INCREMENT NOT NULL, CHANGE Code_Contact code_contact VARCHAR(255) NOT NULL, CHANGE Nom_Contact nom_contact VARCHAR(255) NOT NULL, CHANGE Prenom_Contact prenom_contact VARCHAR(255) NOT NULL, CHANGE Email_Contact email_contact VARCHAR(255) NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('DROP INDEX Num_Licencie ON educateurs');
        $this->addSql('ALTER TABLE educateurs ADD id INT AUTO_INCREMENT NOT NULL, DROP Code_Educateur, CHANGE Administrateur administrateur INT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('DROP INDEX Code_raccourci ON licencies');
        $this->addSql('DROP INDEX Code_Raccourci_2 ON licencies');
        $this->addSql('ALTER TABLE licencies ADD id INT AUTO_INCREMENT NOT NULL, CHANGE Prenom_Licencie prenom_licencie VARCHAR(39) NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE mail_contact');
        $this->addSql('DROP TABLE mail_edu');
        $this->addSql('ALTER TABLE categories MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON categories');
        $this->addSql('ALTER TABLE categories DROP id');
        $this->addSql('ALTER TABLE categories ADD PRIMARY KEY (Code_Raccourci)');
        $this->addSql('ALTER TABLE contact MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON contact');
        $this->addSql('ALTER TABLE contact DROP id, CHANGE code_contact Code_Contact VARCHAR(50) NOT NULL, CHANGE nom_contact Nom_Contact VARCHAR(30) NOT NULL, CHANGE prenom_contact Prenom_Contact VARCHAR(30) NOT NULL, CHANGE email_contact Email_Contact VARCHAR(30) NOT NULL');
        $this->addSql('CREATE INDEX Num_Licence ON contact (Num_Licencie)');
        $this->addSql('CREATE INDEX Num_Licencie ON contact (Num_Licencie)');
        $this->addSql('ALTER TABLE contact ADD PRIMARY KEY (Code_Contact)');
        $this->addSql('ALTER TABLE educateurs MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON educateurs');
        $this->addSql('ALTER TABLE educateurs ADD Code_Educateur VARCHAR(30) NOT NULL, DROP id, CHANGE administrateur Administrateur TINYINT(1) NOT NULL');
        $this->addSql('CREATE INDEX Num_Licencie ON educateurs (Num_Licencie)');
        $this->addSql('ALTER TABLE educateurs ADD PRIMARY KEY (Code_Educateur)');
        $this->addSql('ALTER TABLE licencies MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON licencies');
        $this->addSql('ALTER TABLE licencies DROP id, CHANGE prenom_licencie Prenom_Licencie VARCHAR(30) NOT NULL');
        $this->addSql('CREATE INDEX Code_raccourci ON licencies (Code_Raccourci)');
        $this->addSql('CREATE INDEX Code_Raccourci_2 ON licencies (Code_Raccourci)');
        $this->addSql('ALTER TABLE licencies ADD PRIMARY KEY (Num_Licencie)');
    }
}
