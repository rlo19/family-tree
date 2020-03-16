<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200316063114 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE clan (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, created_date DATETIME NOT NULL, created_by VARCHAR(50) NOT NULL, modified_date DATETIME NOT NULL, modified_by VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE picture (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, clan_id INT DEFAULT NULL, media LONGBLOB NOT NULL, title VARCHAR(70) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, created_date DATETIME NOT NULL, created_by VARCHAR(50) NOT NULL, modified_date DATETIME NOT NULL, modified_by VARCHAR(50) NOT NULL, UNIQUE INDEX UNIQ_16DB4F89A76ED395 (user_id), UNIQUE INDEX UNIQ_16DB4F89BEAF84C8 (clan_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, father_id INT DEFAULT NULL, mother_id INT DEFAULT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, first_name VARCHAR(50) NOT NULL, middle_name VARCHAR(50) NOT NULL, last_name VARCHAR(50) NOT NULL, birthday DATE NOT NULL, work VARCHAR(50) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, created_date DATETIME NOT NULL, created_by VARCHAR(50) NOT NULL, modified_date DATETIME NOT NULL, modified_by VARCHAR(50) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), UNIQUE INDEX UNIQ_8D93D6492055B9A2 (father_id), UNIQUE INDEX UNIQ_8D93D649B78A354D (mother_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_clan (user_id INT NOT NULL, clan_id INT NOT NULL, INDEX IDX_E577EFC5A76ED395 (user_id), INDEX IDX_E577EFC5BEAF84C8 (clan_id), PRIMARY KEY(user_id, clan_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE picture ADD CONSTRAINT FK_16DB4F89A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE picture ADD CONSTRAINT FK_16DB4F89BEAF84C8 FOREIGN KEY (clan_id) REFERENCES clan (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6492055B9A2 FOREIGN KEY (father_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649B78A354D FOREIGN KEY (mother_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_clan ADD CONSTRAINT FK_E577EFC5A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_clan ADD CONSTRAINT FK_E577EFC5BEAF84C8 FOREIGN KEY (clan_id) REFERENCES clan (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE picture DROP FOREIGN KEY FK_16DB4F89BEAF84C8');
        $this->addSql('ALTER TABLE user_clan DROP FOREIGN KEY FK_E577EFC5BEAF84C8');
        $this->addSql('ALTER TABLE picture DROP FOREIGN KEY FK_16DB4F89A76ED395');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6492055B9A2');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649B78A354D');
        $this->addSql('ALTER TABLE user_clan DROP FOREIGN KEY FK_E577EFC5A76ED395');
        $this->addSql('DROP TABLE clan');
        $this->addSql('DROP TABLE picture');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_clan');
    }
}
