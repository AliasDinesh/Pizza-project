<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220518082347 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE orderpizza DROP FOREIGN KEY FK_F5299398D41D1D42');
        $this->addSql('DROP INDEX idx_f5299398d41d1d42 ON orderpizza');
        $this->addSql('CREATE INDEX IDX_DF09C863D41D1D42 ON orderpizza (pizza_id)');
        $this->addSql('ALTER TABLE orderpizza ADD CONSTRAINT FK_F5299398D41D1D42 FOREIGN KEY (pizza_id) REFERENCES pizza (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `orderpizza` DROP FOREIGN KEY FK_DF09C863D41D1D42');
        $this->addSql('DROP INDEX idx_df09c863d41d1d42 ON `orderpizza`');
        $this->addSql('CREATE INDEX IDX_F5299398D41D1D42 ON `orderpizza` (pizza_id)');
        $this->addSql('ALTER TABLE `orderpizza` ADD CONSTRAINT FK_DF09C863D41D1D42 FOREIGN KEY (pizza_id) REFERENCES pizza (id)');
    }
}
