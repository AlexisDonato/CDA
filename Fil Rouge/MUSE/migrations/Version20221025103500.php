<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221025103500 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cart ADD billing_adress_id INT DEFAULT NULL, ADD delivery_address_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cart ADD CONSTRAINT FK_BA388B730959BF2 FOREIGN KEY (billing_adress_id) REFERENCES address (id)');
        $this->addSql('ALTER TABLE cart ADD CONSTRAINT FK_BA388B7EBF23851 FOREIGN KEY (delivery_address_id) REFERENCES address (id)');
        $this->addSql('CREATE INDEX IDX_BA388B730959BF2 ON cart (billing_adress_id)');
        $this->addSql('CREATE INDEX IDX_BA388B7EBF23851 ON cart (delivery_address_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cart DROP FOREIGN KEY FK_BA388B730959BF2');
        $this->addSql('ALTER TABLE cart DROP FOREIGN KEY FK_BA388B7EBF23851');
        $this->addSql('DROP INDEX IDX_BA388B730959BF2 ON cart');
        $this->addSql('DROP INDEX IDX_BA388B7EBF23851 ON cart');
        $this->addSql('ALTER TABLE cart DROP billing_adress_id, DROP delivery_address_id');
    }
}
