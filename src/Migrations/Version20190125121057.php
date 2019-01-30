<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190125121057 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE landing_slider ADD title_arm LONGTEXT NOT NULL, ADD text_arm LONGTEXT NOT NULL, ADD title_eng LONGTEXT NOT NULL, ADD text_eng LONGTEXT NOT NULL, DROP title, DROP text');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE landing_slider ADD title LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, ADD text LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, DROP title_arm, DROP text_arm, DROP title_eng, DROP text_eng');
    }
}
