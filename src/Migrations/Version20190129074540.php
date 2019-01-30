<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190129074540 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE forestation_top ADD title_eng LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE fruit_content ADD title_eng LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE fruit_slider ADD title_eng LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE fruit_top ADD title_eng LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE impact_content ADD title_eng LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE impact_top ADD title_eng LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE interactive_bottom ADD title_eng LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE interactive_slider ADD title_eng LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE kids_top ADD title_eng LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE landing_bottom ADD title_eng LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE landing_sections ADD title_eng LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE lessons_content ADD title_eng LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE lessons_top ADD title_eng LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE magazine ADD title_eng LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE mirak_content ADD title_eng LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE mirak_top ADD title_eng LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE mission_content ADD title_eng LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE mission_top ADD title_eng LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE news ADD title_eng LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE news_panel ADD title_eng LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE ohanian_top ADD title_eng LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE stewardship_slider ADD title_eng LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE stewardship_top ADD title_eng LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE tchalo_content ADD title_eng LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE team_top ADD title_eng LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE tour_bottom ADD title_eng LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE tour_content ADD title_eng LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE tour_top ADD title_eng LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE tree_bottom ADD title_eng LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE tree_top ADD title_eng LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE treevia ADD title_eng LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE videos_content ADD title_eng LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE videos_top ADD title_eng LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE village_bottom_slider ADD title_eng LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE village_content ADD title_eng LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE village_top ADD title_eng LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE village_top_slider ADD title_eng LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE volunteer_content ADD title_eng LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE where_top ADD title_eng LONGTEXT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE forestation_top DROP title_eng');
        $this->addSql('ALTER TABLE fruit_content DROP title_eng');
        $this->addSql('ALTER TABLE fruit_slider DROP title_eng');
        $this->addSql('ALTER TABLE fruit_top DROP title_eng');
        $this->addSql('ALTER TABLE impact_content DROP title_eng');
        $this->addSql('ALTER TABLE impact_top DROP title_eng');
        $this->addSql('ALTER TABLE interactive_bottom DROP title_eng');
        $this->addSql('ALTER TABLE interactive_slider DROP title_eng');
        $this->addSql('ALTER TABLE kids_top DROP title_eng');
        $this->addSql('ALTER TABLE landing_bottom DROP title_eng');
        $this->addSql('ALTER TABLE landing_sections DROP title_eng');
        $this->addSql('ALTER TABLE lessons_content DROP title_eng');
        $this->addSql('ALTER TABLE lessons_top DROP title_eng');
        $this->addSql('ALTER TABLE magazine DROP title_eng');
        $this->addSql('ALTER TABLE mirak_content DROP title_eng');
        $this->addSql('ALTER TABLE mirak_top DROP title_eng');
        $this->addSql('ALTER TABLE mission_content DROP title_eng');
        $this->addSql('ALTER TABLE mission_top DROP title_eng');
        $this->addSql('ALTER TABLE news DROP title_eng');
        $this->addSql('ALTER TABLE news_panel DROP title_eng');
        $this->addSql('ALTER TABLE ohanian_top DROP title_eng');
        $this->addSql('ALTER TABLE stewardship_slider DROP title_eng');
        $this->addSql('ALTER TABLE stewardship_top DROP title_eng');
        $this->addSql('ALTER TABLE tchalo_content DROP title_eng');
        $this->addSql('ALTER TABLE team_top DROP title_eng');
        $this->addSql('ALTER TABLE tour_bottom DROP title_eng');
        $this->addSql('ALTER TABLE tour_content DROP title_eng');
        $this->addSql('ALTER TABLE tour_top DROP title_eng');
        $this->addSql('ALTER TABLE tree_bottom DROP title_eng');
        $this->addSql('ALTER TABLE tree_top DROP title_eng');
        $this->addSql('ALTER TABLE treevia DROP title_eng');
        $this->addSql('ALTER TABLE videos_content DROP title_eng');
        $this->addSql('ALTER TABLE videos_top DROP title_eng');
        $this->addSql('ALTER TABLE village_bottom_slider DROP title_eng');
        $this->addSql('ALTER TABLE village_content DROP title_eng');
        $this->addSql('ALTER TABLE village_top DROP title_eng');
        $this->addSql('ALTER TABLE village_top_slider DROP title_eng');
        $this->addSql('ALTER TABLE volunteer_content DROP title_eng');
        $this->addSql('ALTER TABLE where_top DROP title_eng');
    }
}
