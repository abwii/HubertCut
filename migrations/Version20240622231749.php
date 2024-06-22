<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240622231749 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rdv ADD rdv_user_id_id INT NOT NULL, ADD rdv_cutter_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE rdv ADD CONSTRAINT FK_10C31F864ACDBE68 FOREIGN KEY (rdv_user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE rdv ADD CONSTRAINT FK_10C31F86657EACDF FOREIGN KEY (rdv_cutter_id_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_10C31F864ACDBE68 ON rdv (rdv_user_id_id)');
        $this->addSql('CREATE INDEX IDX_10C31F86657EACDF ON rdv (rdv_cutter_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rdv DROP FOREIGN KEY FK_10C31F864ACDBE68');
        $this->addSql('ALTER TABLE rdv DROP FOREIGN KEY FK_10C31F86657EACDF');
        $this->addSql('DROP INDEX IDX_10C31F864ACDBE68 ON rdv');
        $this->addSql('DROP INDEX IDX_10C31F86657EACDF ON rdv');
        $this->addSql('ALTER TABLE rdv DROP rdv_user_id_id, DROP rdv_cutter_id_id');
    }
}
