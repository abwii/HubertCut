<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240622224512 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rdv ADD rdv_cut_id INT NOT NULL, DROP rdv_client_id, DROP rdv_cutter_id');
        $this->addSql('ALTER TABLE rdv ADD CONSTRAINT FK_10C31F866D14D590 FOREIGN KEY (rdv_cut_id) REFERENCES cut (id)');
        $this->addSql('CREATE INDEX IDX_10C31F866D14D590 ON rdv (rdv_cut_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rdv DROP FOREIGN KEY FK_10C31F866D14D590');
        $this->addSql('DROP INDEX IDX_10C31F866D14D590 ON rdv');
        $this->addSql('ALTER TABLE rdv ADD rdv_cutter_id INT NOT NULL, CHANGE rdv_cut_id rdv_client_id INT NOT NULL');
    }
}
