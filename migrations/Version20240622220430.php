<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240622220430 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_cut (user_id INT NOT NULL, cut_id INT NOT NULL, INDEX IDX_5BE6F576A76ED395 (user_id), INDEX IDX_5BE6F57673CD9801 (cut_id), PRIMARY KEY(user_id, cut_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_cut ADD CONSTRAINT FK_5BE6F576A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_cut ADD CONSTRAINT FK_5BE6F57673CD9801 FOREIGN KEY (cut_id) REFERENCES cut (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user DROP cutter_cuts');
        $this->addSql('ALTER TABLE user RENAME INDEX uniq_identifier_email TO UNIQ_8D93D649E7927C74');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_cut DROP FOREIGN KEY FK_5BE6F576A76ED395');
        $this->addSql('ALTER TABLE user_cut DROP FOREIGN KEY FK_5BE6F57673CD9801');
        $this->addSql('DROP TABLE user_cut');
        $this->addSql('ALTER TABLE user ADD cutter_cuts JSON DEFAULT NULL');
        $this->addSql('ALTER TABLE user RENAME INDEX uniq_8d93d649e7927c74 TO UNIQ_IDENTIFIER_EMAIL');
    }
}
