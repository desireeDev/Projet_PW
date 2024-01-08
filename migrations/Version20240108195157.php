<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240108195157 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categories (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE educateur (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE licencies (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mail_contact (id INT AUTO_INCREMENT NOT NULL, dateenvoi DATETIME NOT NULL, objet VARCHAR(30) NOT NULL, message VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mail_contact_contact (mail_contact_id INT NOT NULL, contact_id INT NOT NULL, INDEX IDX_94F6F3BB3362CFB6 (mail_contact_id), INDEX IDX_94F6F3BBE7A1254A (contact_id), PRIMARY KEY(mail_contact_id, contact_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mail_edu (id INT AUTO_INCREMENT NOT NULL, educateurs_id INT NOT NULL, dateenvoi DATETIME NOT NULL, objet VARCHAR(30) NOT NULL, message VARCHAR(30) NOT NULL, INDEX IDX_8CB8D4A3A26C38 (educateurs_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE mail_contact_contact ADD CONSTRAINT FK_94F6F3BB3362CFB6 FOREIGN KEY (mail_contact_id) REFERENCES mail_contact (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mail_contact_contact ADD CONSTRAINT FK_94F6F3BBE7A1254A FOREIGN KEY (contact_id) REFERENCES contact (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mail_edu ADD CONSTRAINT FK_8CB8D4A3A26C38 FOREIGN KEY (educateurs_id) REFERENCES educateur (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mail_contact_contact DROP FOREIGN KEY FK_94F6F3BB3362CFB6');
        $this->addSql('ALTER TABLE mail_contact_contact DROP FOREIGN KEY FK_94F6F3BBE7A1254A');
        $this->addSql('ALTER TABLE mail_edu DROP FOREIGN KEY FK_8CB8D4A3A26C38');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE educateur');
        $this->addSql('DROP TABLE licencies');
        $this->addSql('DROP TABLE mail_contact');
        $this->addSql('DROP TABLE mail_contact_contact');
        $this->addSql('DROP TABLE mail_edu');
    }
}
