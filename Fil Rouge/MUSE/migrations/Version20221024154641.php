<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221024154641 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE address CHANGE name name VARCHAR(100) DEFAULT NULL, CHANGE country country VARCHAR(50) DEFAULT NULL, CHANGE zipcode zipcode VARCHAR(25) DEFAULT NULL, CHANGE city city VARCHAR(100) DEFAULT NULL, CHANGE path_type path_type VARCHAR(150) DEFAULT NULL, CHANGE path_number path_number VARCHAR(10) DEFAULT NULL');
        $this->addSql('ALTER TABLE cart CHANGE carrier carrier VARCHAR(25) DEFAULT NULL, CHANGE carrier_shipment_id carrier_shipment_id VARCHAR(25) DEFAULT NULL');
        $this->addSql('ALTER TABLE category CHANGE name name VARCHAR(100) NOT NULL');
        $this->addSql('ALTER TABLE contact CHANGE name name VARCHAR(100) DEFAULT NULL, CHANGE email email VARCHAR(100) DEFAULT NULL');
        $this->addSql('ALTER TABLE product CHANGE name name VARCHAR(150) NOT NULL, CHANGE image image VARCHAR(200) DEFAULT NULL, CHANGE image1 image1 VARCHAR(200) DEFAULT NULL, CHANGE image2 image2 VARCHAR(200) DEFAULT NULL');
        $this->addSql('ALTER TABLE supplier CHANGE name name VARCHAR(100) DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE user_name user_name VARCHAR(100) NOT NULL, CHANGE user_lastname user_lastname VARCHAR(100) NOT NULL, CHANGE phone_number phone_number VARCHAR(25) NOT NULL, CHANGE pro_company_name pro_company_name VARCHAR(100) DEFAULT NULL, CHANGE pro_duns pro_duns VARCHAR(9) DEFAULT NULL, CHANGE pro_job_position pro_job_position VARCHAR(100) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category CHANGE name name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE user CHANGE user_name user_name VARCHAR(255) NOT NULL, CHANGE user_lastname user_lastname VARCHAR(255) NOT NULL, CHANGE phone_number phone_number VARCHAR(255) NOT NULL, CHANGE pro_company_name pro_company_name VARCHAR(255) DEFAULT NULL, CHANGE pro_duns pro_duns VARCHAR(255) DEFAULT NULL, CHANGE pro_job_position pro_job_position VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE supplier CHANGE name name VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE cart CHANGE carrier carrier VARCHAR(255) DEFAULT NULL, CHANGE carrier_shipment_id carrier_shipment_id VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE product CHANGE name name VARCHAR(255) NOT NULL, CHANGE image image VARCHAR(255) DEFAULT NULL, CHANGE image1 image1 VARCHAR(255) DEFAULT NULL, CHANGE image2 image2 VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE address CHANGE name name VARCHAR(255) DEFAULT NULL, CHANGE country country VARCHAR(255) DEFAULT NULL, CHANGE zipcode zipcode VARCHAR(255) DEFAULT NULL, CHANGE city city VARCHAR(255) DEFAULT NULL, CHANGE path_type path_type VARCHAR(255) DEFAULT NULL, CHANGE path_number path_number VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE contact CHANGE name name VARCHAR(255) DEFAULT NULL, CHANGE email email VARCHAR(255) DEFAULT NULL');
    }
}
