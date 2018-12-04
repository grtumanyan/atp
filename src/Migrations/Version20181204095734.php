<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181204095734 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE news CHANGE title title LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE news_images DROP FOREIGN KEY FK_6CB67D1EB5A459A0');
        $this->addSql('ALTER TABLE news_images ADD CONSTRAINT FK_6CB67D1EB5A459A0 FOREIGN KEY (news_id) REFERENCES news (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE news_panel DROP FOREIGN KEY FK_D8125451B5A459A0');
        $this->addSql('ALTER TABLE news_panel ADD CONSTRAINT FK_D8125451B5A459A0 FOREIGN KEY (news_id) REFERENCES news (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE news CHANGE title title VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE news_images DROP FOREIGN KEY FK_6CB67D1EB5A459A0');
        $this->addSql('ALTER TABLE news_images ADD CONSTRAINT FK_6CB67D1EB5A459A0 FOREIGN KEY (news_id) REFERENCES news (id)');
        $this->addSql('ALTER TABLE news_panel DROP FOREIGN KEY FK_D8125451B5A459A0');
        $this->addSql('ALTER TABLE news_panel ADD CONSTRAINT FK_D8125451B5A459A0 FOREIGN KEY (news_id) REFERENCES news (id)');
    }
}
