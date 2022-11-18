<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221118075746 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE address (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, name VARCHAR(100) DEFAULT NULL, country VARCHAR(50) DEFAULT NULL, zipcode VARCHAR(25) DEFAULT NULL, city VARCHAR(100) DEFAULT NULL, path_type VARCHAR(150) DEFAULT NULL, path_number VARCHAR(10) DEFAULT NULL, billing_address TINYINT(1) DEFAULT NULL, delivery_address TINYINT(1) DEFAULT NULL, INDEX IDX_D4E6F81A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cart (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, billing_address_id INT DEFAULT NULL, delivery_address_id INT DEFAULT NULL, client_order_id VARCHAR(255) NOT NULL, validated TINYINT(1) NOT NULL, order_date DATETIME DEFAULT NULL, shipped TINYINT(1) NOT NULL, shipment_date DATETIME DEFAULT NULL, carrier VARCHAR(25) DEFAULT NULL, carrier_shipment_id VARCHAR(25) DEFAULT NULL, total NUMERIC(12, 2) DEFAULT NULL, additional_discount_rate NUMERIC(3, 3) NOT NULL, invoice VARCHAR(150) DEFAULT NULL, INDEX IDX_BA388B7A76ED395 (user_id), INDEX IDX_BA388B779D0C0E4 (billing_address_id), INDEX IDX_BA388B7EBF23851 (delivery_address_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, parent_category_id INT DEFAULT NULL, name VARCHAR(100) NOT NULL, INDEX IDX_64C19C1796A8F92 (parent_category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, name VARCHAR(100) DEFAULT NULL, email VARCHAR(100) DEFAULT NULL, message VARCHAR(255) DEFAULT NULL, subject LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:json)\', enquiry_date DATETIME DEFAULT NULL, INDEX IDX_4C62E638A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE order_details (id INT AUTO_INCREMENT NOT NULL, product_id INT NOT NULL, cart_id INT NOT NULL, quantity INT NOT NULL, sub_total DOUBLE PRECISION DEFAULT NULL, INDEX IDX_845CA2C11AD5CDBF (cart_id), INDEX IDX_845CA2C14584665A (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, supplier_id INT DEFAULT NULL, category_id INT DEFAULT NULL, name VARCHAR(150) NOT NULL, price INT NOT NULL, description VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, discount TINYINT(1) NOT NULL, discount_rate NUMERIC(3, 3) NOT NULL, quantity INT DEFAULT NULL, image VARCHAR(200) DEFAULT NULL, image1 VARCHAR(200) DEFAULT NULL, image2 VARCHAR(200) DEFAULT NULL, INDEX IDX_D34A04AD2ADD6D8C (supplier_id), INDEX IDX_D34A04AD12469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reset_password_request (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, selector VARCHAR(20) NOT NULL, hashed_token VARCHAR(100) NOT NULL, requested_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', expires_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_7CE748AA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE supplier (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, user_name VARCHAR(100) NOT NULL, user_lastname VARCHAR(100) NOT NULL, birthdate DATETIME NOT NULL, phone_number VARCHAR(25) NOT NULL, is_verified TINYINT(1) NOT NULL, register_date DATETIME NOT NULL, vat NUMERIC(4, 2) DEFAULT NULL, pro TINYINT(1) NOT NULL, pro_company_name VARCHAR(100) DEFAULT NULL, pro_duns VARCHAR(9) DEFAULT NULL, pro_job_position VARCHAR(100) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rememberme_token (series VARCHAR(88) NOT NULL, value VARCHAR(88) NOT NULL, lastUsed DATETIME NOT NULL, class VARCHAR(100) NOT NULL, username VARCHAR(200) NOT NULL, PRIMARY KEY(series)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE address ADD CONSTRAINT FK_D4E6F81A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE cart ADD CONSTRAINT FK_BA388B7A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE cart ADD CONSTRAINT FK_BA388B779D0C0E4 FOREIGN KEY (billing_address_id) REFERENCES address (id)');
        $this->addSql('ALTER TABLE cart ADD CONSTRAINT FK_BA388B7EBF23851 FOREIGN KEY (delivery_address_id) REFERENCES address (id)');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C1796A8F92 FOREIGN KEY (parent_category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E638A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE order_details ADD CONSTRAINT FK_845CA2C11AD5CDBF FOREIGN KEY (cart_id) REFERENCES cart (id)');
        $this->addSql('ALTER TABLE order_details ADD CONSTRAINT FK_845CA2C14584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD2ADD6D8C FOREIGN KEY (supplier_id) REFERENCES supplier (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE reset_password_request ADD CONSTRAINT FK_7CE748AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE address DROP FOREIGN KEY FK_D4E6F81A76ED395');
        $this->addSql('ALTER TABLE cart DROP FOREIGN KEY FK_BA388B7A76ED395');
        $this->addSql('ALTER TABLE cart DROP FOREIGN KEY FK_BA388B779D0C0E4');
        $this->addSql('ALTER TABLE cart DROP FOREIGN KEY FK_BA388B7EBF23851');
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C1796A8F92');
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY FK_4C62E638A76ED395');
        $this->addSql('ALTER TABLE order_details DROP FOREIGN KEY FK_845CA2C11AD5CDBF');
        $this->addSql('ALTER TABLE order_details DROP FOREIGN KEY FK_845CA2C14584665A');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD2ADD6D8C');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD12469DE2');
        $this->addSql('ALTER TABLE reset_password_request DROP FOREIGN KEY FK_7CE748AA76ED395');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE cart');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE order_details');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE reset_password_request');
        $this->addSql('DROP TABLE supplier');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE rememberme_token');
    }
}
