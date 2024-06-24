<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240624022949 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bill (id INT AUTO_INCREMENT NOT NULL, bill_price DOUBLE PRECISION NOT NULL, bill_date DATE NOT NULL, bill_status VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, comment_rate INT NOT NULL, comment_text VARCHAR(255) DEFAULT NULL, comment_date DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cut (id INT AUTO_INCREMENT NOT NULL, cut_name VARCHAR(255) NOT NULL, cut_price DOUBLE PRECISION NOT NULL, cut_description LONGTEXT NOT NULL, cut_sex VARCHAR(10) NOT NULL, cut_length VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rdv (id INT AUTO_INCREMENT NOT NULL, rdv_cut_id INT NOT NULL, rdv_user_id INT NOT NULL, rdv_cutter_id INT NOT NULL, rdv_date DATE NOT NULL, rdv_status VARCHAR(255) DEFAULT NULL, rdv_coordinates_x DOUBLE PRECISION DEFAULT NULL, rdv_coordinates_y DOUBLE PRECISION DEFAULT NULL, rdv_price DOUBLE PRECISION DEFAULT NULL, INDEX IDX_10C31F866D14D590 (rdv_cut_id), INDEX IDX_10C31F862078A90A (rdv_user_id), INDEX IDX_10C31F86A02E883D (rdv_cutter_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, role_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, phone_number VARCHAR(20) NOT NULL, cutter_description LONGTEXT DEFAULT NULL, cutter_rank DOUBLE PRECISION DEFAULT NULL, profile_picture VARCHAR(255) DEFAULT NULL, cutter_status VARCHAR(255) DEFAULT NULL, cutter_cuts_done INT DEFAULT NULL, user_coordinates_x DOUBLE PRECISION DEFAULT NULL, user_coordinates_y DOUBLE PRECISION DEFAULT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, rdv_comment LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_cut (user_id INT NOT NULL, cut_id INT NOT NULL, INDEX IDX_5BE6F576A76ED395 (user_id), INDEX IDX_5BE6F57673CD9801 (cut_id), PRIMARY KEY(user_id, cut_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE rdv ADD CONSTRAINT FK_10C31F866D14D590 FOREIGN KEY (rdv_cut_id) REFERENCES cut (id)');
        $this->addSql('ALTER TABLE rdv ADD CONSTRAINT FK_10C31F862078A90A FOREIGN KEY (rdv_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE rdv ADD CONSTRAINT FK_10C31F86A02E883D FOREIGN KEY (rdv_cutter_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_cut ADD CONSTRAINT FK_5BE6F576A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_cut ADD CONSTRAINT FK_5BE6F57673CD9801 FOREIGN KEY (cut_id) REFERENCES cut (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rdv DROP FOREIGN KEY FK_10C31F866D14D590');
        $this->addSql('ALTER TABLE rdv DROP FOREIGN KEY FK_10C31F862078A90A');
        $this->addSql('ALTER TABLE rdv DROP FOREIGN KEY FK_10C31F86A02E883D');
        $this->addSql('ALTER TABLE user_cut DROP FOREIGN KEY FK_5BE6F576A76ED395');
        $this->addSql('ALTER TABLE user_cut DROP FOREIGN KEY FK_5BE6F57673CD9801');
        $this->addSql('DROP TABLE bill');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE cut');
        $this->addSql('DROP TABLE rdv');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_cut');
    }
}
