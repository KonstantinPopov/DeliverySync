<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20130531155701 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
        
        $this->addSql("CREATE TABLE intime_tarify (id INT AUTO_INCREMENT NOT NULL, package_type VARCHAR(255) DEFAULT NULL, zone_id INT DEFAULT NULL, weigth_min INT DEFAULT NULL, weigth_max INT DEFAULT NULL, size_min NUMERIC(10, 2) DEFAULT NULL, size_max NUMERIC(10, 2) DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, tarif NUMERIC(10, 2) NOT NULL, tarif_extra NUMERIC(10, 2) DEFAULT NULL, update_status VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE intime_zone (id INT AUTO_INCREMENT NOT NULL, zone_id INT DEFAULT NULL, to_city VARCHAR(255) NOT NULL, from_city VARCHAR(255) NOT NULL, tarif NUMERIC(10, 2) DEFAULT NULL, tarif_for_sector NUMERIC(10, 2) DEFAULT NULL, update_status VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE novaposhta_zone (id INT AUTO_INCREMENT NOT NULL, to_city_id INT DEFAULT NULL, from_city_id INT DEFAULT NULL, rate NUMERIC(10, 2) NOT NULL, update_status VARCHAR(255) DEFAULT NULL, INDEX IDX_FFBCC0465345F5A (to_city_id), INDEX IDX_FFBCC046DF28100 (from_city_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE intime_package_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, cost NUMERIC(10, 2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE novaposhta_tarify (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, weight VARCHAR(255) DEFAULT NULL, min NUMERIC(10, 3) DEFAULT NULL, max NUMERIC(10, 3) DEFAULT NULL, tarif NUMERIC(10, 2) NOT NULL, zone_id INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("ALTER TABLE novaposhta_zone ADD CONSTRAINT FK_FFBCC0465345F5A FOREIGN KEY (to_city_id) REFERENCES geo_city (id)");
        $this->addSql("ALTER TABLE novaposhta_zone ADD CONSTRAINT FK_FFBCC046DF28100 FOREIGN KEY (from_city_id) REFERENCES geo_city (id)");
        $this->addSql("ALTER TABLE delivery_service ADD registration_cost INT DEFAULT NULL, ADD commission NUMERIC(10, 2) DEFAULT NULL, ADD min_commission NUMERIC(10, 2) DEFAULT NULL");
    }

    public function down(Schema $schema)
    {
        // this down() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
        
        $this->addSql("DROP TABLE intime_tarify");
        $this->addSql("DROP TABLE intime_zone");
        $this->addSql("DROP TABLE novaposhta_zone");
        $this->addSql("DROP TABLE intime_package_type");
        $this->addSql("DROP TABLE novaposhta_tarify");
        $this->addSql("ALTER TABLE delivery_service DROP registration_cost, DROP commission, DROP min_commission");
    }
}
