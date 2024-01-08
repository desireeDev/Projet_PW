
<?php







use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20220107124500 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create MailEdu table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE mail_edu (
            id INT AUTO_INCREMENT NOT NULL, 
            dateenvoi DATETIME NOT NULL, 
            objet VARCHAR(30) NOT NULL, 
            message VARCHAR(30) NOT NULL, 
            educateurs_id INT NOT NULL, 
            PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');

        $this->addSql('ALTER TABLE mail_edu 
            ADD CONSTRAINT FK_5E56F9C4EDAD4FE0 FOREIGN KEY (educateurs_id) REFERENCES educateur (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE mail_edu');
    }
}
