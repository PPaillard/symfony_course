<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250801092254 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE episode (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, number INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE appearance (episode_id INT NOT NULL, character_id INT NOT NULL, INDEX IDX_AAB38290362B62A0 (episode_id), INDEX IDX_AAB382901136BE75 (character_id), PRIMARY KEY(episode_id, character_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE appearance ADD CONSTRAINT FK_AAB38290362B62A0 FOREIGN KEY (episode_id) REFERENCES episode (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE appearance ADD CONSTRAINT FK_AAB382901136BE75 FOREIGN KEY (character_id) REFERENCES `character` (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE appearance DROP FOREIGN KEY FK_AAB38290362B62A0');
        $this->addSql('ALTER TABLE appearance DROP FOREIGN KEY FK_AAB382901136BE75');
        $this->addSql('DROP TABLE episode');
        $this->addSql('DROP TABLE appearance');
    }
}
