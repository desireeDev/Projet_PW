<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220113123456 extends AbstractMigration
{
    public function up(Schema $schema): void
    {
        // Création de la table mail_educateur
        $this->addSql('CREATE TABLE mail_educateur (
            id INT AUTO_INCREMENT NOT NULL, 
            date_envoi DATETIME NOT NULL, 
            objet VARCHAR(255) NOT NULL, 
            message VARCHAR(255) NOT NULL, 
            expediteur_id INT DEFAULT NULL, 
            PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');

        // Création de la table mail_educateur_educateur (pour la relation ManyToMany)
        $this->addSql('CREATE TABLE mail_educateur_educateur (
            mail_educateur_id INT NOT NULL, 
            educateur_id INT NOT NULL, 
            INDEX IDX_88C261A3EAFF4E56 (mail_educateur_id), 
            INDEX IDX_88C261A3E5771AD6 (educateur_id), 
            PRIMARY KEY(mail_educateur_id, educateur_id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');

        // Ajout des clés étrangères
        $this->addSql('ALTER TABLE mail_educateur ADD CONSTRAINT FK_8CACEB836CCC6A9F FOREIGN KEY (expediteur_id) REFERENCES educateur (id)');
        $this->addSql('ALTER TABLE mail_educateur_educateur ADD CONSTRAINT FK_88C261A3EAFF4E56 FOREIGN KEY (mail_educateur_id) REFERENCES mail_educateur (id)');
        $this->addSql('ALTER TABLE mail_educateur_educateur ADD CONSTRAINT FK_88C261A3E5771AD6 FOREIGN KEY (educateur_id) REFERENCES educateur (id)');
    }

    public function down(Schema $schema): void
    {
        // Suppression des tables en cas de retour en arrière (down migration)
        $this->addSql('DROP TABLE mail_educateur_educateur');
        $this->addSql('DROP TABLE mail_educateur');
    }
}