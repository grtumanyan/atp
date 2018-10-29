<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181029092241 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE landing_bottom (id INT AUTO_INCREMENT NOT NULL, title LONGTEXT NOT NULL, image VARCHAR(200) NOT NULL, updated_at DATETIME NOT NULL, date_created DATE DEFAULT NULL, link LONGTEXT DEFAULT NULL, link_type VARCHAR(255) NOT NULL, position VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE landing_slider (id INT AUTO_INCREMENT NOT NULL, title LONGTEXT NOT NULL, text LONGTEXT NOT NULL, image VARCHAR(200) NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE news (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(50) NOT NULL, text LONGTEXT NOT NULL, image VARCHAR(50) NOT NULL, date_created DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE news_images (id INT AUTO_INCREMENT NOT NULL, news_id INT NOT NULL, image VARCHAR(50) NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_6CB67D1EB5A459A0 (news_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE news_panel (id INT AUTO_INCREMENT NOT NULL, news_id INT NOT NULL, title VARCHAR(50) DEFAULT NULL, text LONGTEXT NOT NULL, INDEX IDX_D8125451B5A459A0 (news_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE news_images ADD CONSTRAINT FK_6CB67D1EB5A459A0 FOREIGN KEY (news_id) REFERENCES news (id)');
        $this->addSql('ALTER TABLE news_panel ADD CONSTRAINT FK_D8125451B5A459A0 FOREIGN KEY (news_id) REFERENCES news (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE news_images DROP FOREIGN KEY FK_6CB67D1EB5A459A0');
        $this->addSql('ALTER TABLE news_panel DROP FOREIGN KEY FK_D8125451B5A459A0');
        $this->addSql('DROP TABLE landing_bottom');
        $this->addSql('DROP TABLE landing_slider');
        $this->addSql('DROP TABLE news');
        $this->addSql('DROP TABLE news_images');
        $this->addSql('DROP TABLE news_panel');
    }
}
