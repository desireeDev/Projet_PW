<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220113123457 extends AbstractMigration
{
    public function up(Schema $schema): void
    {
        // Création de la table mail_contact
        $this->addSql('CREATE TABLE mail_contact (
            id INT AUTO_INCREMENT NOT NULL, 
            date_envoi DATETIME NOT NULL, 
            objet VARCHAR(255) NOT NULL, 
            message VARCHAR(255) NOT NULL, 
            expediteur_id INT NOT NULL, 
            PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');

        // Création de la table mail_educateur_contact (pour la relation ManyToMany)
        $this->addSql('CREATE TABLE mail_educateur_contact (
            mail_contact_id INT NOT NULL, 
            contact_id INT NOT NULL, 
            INDEX IDX_88C261A3EAFF4E56 (mail_contact_id), 
            INDEX IDX_88C261A3E5771AD6 (contact_id), 
            PRIMARY KEY(mail_contact_id, contact_id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');

        // Ajout des clés étrangères
        $this->addSql('ALTER TABLE mail_contact ADD CONSTRAINT FK_8CACEB836CCC6A9F FOREIGN KEY (expediteur_id) REFERENCES educateur (id)');
        $this->addSql('ALTER TABLE mail_educateur_contact ADD CONSTRAINT FK_88C261A3EAFF4E58 FOREIGN KEY (mail_contact_id) REFERENCES mail_contact (id)');
        $this->addSql('ALTER TABLE mail_educateur_contact ADD CONSTRAINT FK_88C261A3E5771AD8 FOREIGN KEY (contact_id) REFERENCES contact (id)');
    }

    public function down(Schema $schema): void
    {
        // Suppression des tables en cas de retour en arrière (down migration)
        $this->addSql('DROP TABLE mail_educateur_contact');
        $this->addSql('DROP TABLE mail_contact');
    }
}