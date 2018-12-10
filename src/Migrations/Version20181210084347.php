<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181210084347 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE empowering_content (id INT AUTO_INCREMENT NOT NULL, image LONGTEXT NOT NULL, position LONGTEXT NOT NULL, title LONGTEXT NOT NULL, text LONGTEXT NOT NULL, link LONGTEXT DEFAULT NULL, link_text LONGTEXT NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE empowering_featured (id INT AUTO_INCREMENT NOT NULL, text LONGTEXT NOT NULL, date_created DATE NOT NULL, link_type LONGTEXT NOT NULL, link LONGTEXT NOT NULL, image LONGTEXT NOT NULL, updated_at DATETIME NOT NULL, position LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE empowering_top (id INT AUTO_INCREMENT NOT NULL, text_top LONGTEXT NOT NULL, title LONGTEXT NOT NULL, text_bottom LONGTEXT NOT NULL, image LONGTEXT NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ohanian_bottom_content (id INT AUTO_INCREMENT NOT NULL, image LONGTEXT NOT NULL, text LONGTEXT NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ohanian_top (id INT AUTO_INCREMENT NOT NULL, text LONGTEXT NOT NULL, title LONGTEXT NOT NULL, image LONGTEXT NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ohanian_top_content (id INT AUTO_INCREMENT NOT NULL, image LONGTEXT NOT NULL, text LONGTEXT NOT NULL, link LONGTEXT DEFAULT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE empowering_content');
        $this->addSql('DROP TABLE empowering_featured');
        $this->addSql('DROP TABLE empowering_top');
        $this->addSql('DROP TABLE ohanian_bottom_content');
        $this->addSql('DROP TABLE ohanian_top');
        $this->addSql('DROP TABLE ohanian_top_content');
    }
}
