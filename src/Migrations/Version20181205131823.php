<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181205131823 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE fruit_slider (id INT AUTO_INCREMENT NOT NULL, text LONGTEXT NOT NULL, title LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fruit_slider_images (id INT AUTO_INCREMENT NOT NULL, slider_id INT NOT NULL, image VARCHAR(50) NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_CC492F6C2CCC9638 (slider_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE fruit_slider_images ADD CONSTRAINT FK_CC492F6C2CCC9638 FOREIGN KEY (slider_id) REFERENCES fruit_slider (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE fruit_slider_images DROP FOREIGN KEY FK_CC492F6C2CCC9638');
        $this->addSql('DROP TABLE fruit_slider');
        $this->addSql('DROP TABLE fruit_slider_images');
    }
}
