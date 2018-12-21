<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181221084144 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE donation CHANGE account_number account_number LONGTEXT DEFAULT NULL, CHANGE account_holder account_holder LONGTEXT DEFAULT NULL, CHANGE expiry_month expiry_month LONGTEXT DEFAULT NULL, CHANGE expiry_year expiry_year LONGTEXT DEFAULT NULL, CHANGE cvv cvv LONGTEXT DEFAULT NULL, CHANGE comments comments LONGTEXT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE donation CHANGE account_number account_number LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE account_holder account_holder LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE expiry_month expiry_month LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE expiry_year expiry_year LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE cvv cvv LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE comments comments LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
