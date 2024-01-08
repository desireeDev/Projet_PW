
 <?php


use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;




final class Version20220107123456 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create MailContact table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE mail_contact (
            id INT AUTO_INCREMENT NOT NULL, 
            dateenvoi DATETIME NOT NULL, 
            objet VARCHAR(30) NOT NULL, 
            message VARCHAR(30) NOT NULL, 
            PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');

        $this->addSql('CREATE TABLE mail_contact_contact (
            mail_contact_id INT NOT NULL, 
            contact_id INT NOT NULL, 
            INDEX IDX_5E56F9C4BF396750 (mail_contact_id), 
            INDEX IDX_5E56F9C4E7AFD1DD (contact_id), 
            PRIMARY KEY(mail_contact_id, contact_id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');

        $this->addSql('ALTER TABLE mail_contact_contact 
            ADD CONSTRAINT FK_5E56F9C4BF396750 FOREIGN KEY (mail_contact_id) REFERENCES mail_contact (id) ON DELETE CASCADE, 
            ADD CONSTRAINT FK_5E56F9C4E7AFD1DD FOREIGN KEY (contact_id) REFERENCES contact (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE mail_contact_contact');
        $this->addSql('DROP TABLE mail_contact');
    }
}

