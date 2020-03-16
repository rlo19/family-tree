<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200316054051 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE clan (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, created_by VARCHAR(50) NOT NULL, created_date DATETIME NOT NULL, modified_by VARCHAR(50) NOT NULL, modified_date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');

        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, person_id INT NOT NULL, image LONGBLOB NOT NULL, created_by VARCHAR(50) NOT NULL, created_date DATETIME NOT NULL, modified_by VARCHAR(50) NOT NULL, modified_date DATETIME NOT NULL, INDEX IDX_C53D045F217BBB47 (person_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');

        $this->addSql('CREATE TABLE image_clan (image_id INT NOT NULL, clan_id INT NOT NULL, INDEX IDX_6DCC49923DA5256D (image_id), INDEX IDX_6DCC4992BEAF84C8 (clan_id), PRIMARY KEY(image_id, clan_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');

        $this->addSql('CREATE TABLE person (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(50) NOT NULL, middle_name VARCHAR(50) NOT NULL, last_name VARCHAR(50) NOT NULL, birthday DATE NOT NULL, work VARCHAR(50) DEFAULT NULL, father SMALLINT DEFAULT NULL, mother SMALLINT DEFAULT NULL, spouse SMALLINT DEFAULT NULL, clans VARCHAR(10) NOT NULL, email VARCHAR(50) DEFAULT NULL, phone_no VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, created_by VARCHAR(50) NOT NULL, created_date DATETIME NOT NULL, modified_by VARCHAR(50) NOT NULL, modified_date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');

        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045F217BBB47 FOREIGN KEY (person_id) REFERENCES person (id)');
        $this->addSql('ALTER TABLE image_clan ADD CONSTRAINT FK_6DCC49923DA5256D FOREIGN KEY (image_id) REFERENCES image (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE image_clan ADD CONSTRAINT FK_6DCC4992BEAF84C8 FOREIGN KEY (clan_id) REFERENCES clan (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE image_clan DROP FOREIGN KEY FK_6DCC4992BEAF84C8');
        $this->addSql('ALTER TABLE image_clan DROP FOREIGN KEY FK_6DCC49923DA5256D');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045F217BBB47');
        $this->addSql('DROP TABLE clan');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE image_clan');
        $this->addSql('DROP TABLE person');
    }
}
