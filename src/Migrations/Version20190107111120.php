<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190107111120 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE stewardship_slider_images DROP FOREIGN KEY FK_A865FBCC2CCC9638');
        $this->addSql('ALTER TABLE stewardship_slider_images ADD CONSTRAINT FK_A865FBCC2CCC9638 FOREIGN KEY (slider_id) REFERENCES stewardship_slider (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE stewardship_slider_images DROP FOREIGN KEY FK_A865FBCC2CCC9638');
        $this->addSql('ALTER TABLE stewardship_slider_images ADD CONSTRAINT FK_A865FBCC2CCC9638 FOREIGN KEY (slider_id) REFERENCES fruit_slider (id) ON DELETE CASCADE');
    }
}