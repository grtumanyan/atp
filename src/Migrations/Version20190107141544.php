<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190107141544 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE village_bottom_slider (id INT AUTO_INCREMENT NOT NULL, text LONGTEXT NOT NULL, title LONGTEXT NOT NULL, position LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE village_bottom_slider_images (id INT AUTO_INCREMENT NOT NULL, slider_id INT NOT NULL, image VARCHAR(50) NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_88720D2E2CCC9638 (slider_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE village_content (id INT AUTO_INCREMENT NOT NULL, text LONGTEXT NOT NULL, image LONGTEXT NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE village_featured (id INT AUTO_INCREMENT NOT NULL, text LONGTEXT NOT NULL, date_created DATE NOT NULL, link_type LONGTEXT NOT NULL, link LONGTEXT NOT NULL, image VARCHAR(200) NOT NULL, updated_at DATETIME NOT NULL, position LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE village_top (id INT AUTO_INCREMENT NOT NULL, title LONGTEXT NOT NULL, text LONGTEXT NOT NULL, image LONGTEXT NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE village_top_slider (id INT AUTO_INCREMENT NOT NULL, text LONGTEXT NOT NULL, title LONGTEXT NOT NULL, position LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE village_top_slider_images (id INT AUTO_INCREMENT NOT NULL, slider_id INT NOT NULL, image VARCHAR(50) NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_8DD953A12CCC9638 (slider_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE village_bottom_slider_images ADD CONSTRAINT FK_88720D2E2CCC9638 FOREIGN KEY (slider_id) REFERENCES village_bottom_slider (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE village_top_slider_images ADD CONSTRAINT FK_8DD953A12CCC9638 FOREIGN KEY (slider_id) REFERENCES village_top_slider (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE village_bottom_slider_images DROP FOREIGN KEY FK_88720D2E2CCC9638');
        $this->addSql('ALTER TABLE village_top_slider_images DROP FOREIGN KEY FK_8DD953A12CCC9638');
        $this->addSql('DROP TABLE village_bottom_slider');
        $this->addSql('DROP TABLE village_bottom_slider_images');
        $this->addSql('DROP TABLE village_content');
        $this->addSql('DROP TABLE village_featured');
        $this->addSql('DROP TABLE village_top');
        $this->addSql('DROP TABLE village_top_slider');
        $this->addSql('DROP TABLE village_top_slider_images');
    }
}
