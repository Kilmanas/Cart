<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220913120638 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cart (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, status VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        )');
        $this->addSql('CREATE TABLE cart_item (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, product_id INTEGER NOT NULL, cart_id_id INTEGER NOT NULL, quantity INTEGER NOT NULL)');
        $this->addSql('CREATE INDEX IDX_F0FE25274584665A ON cart_item (product_id)');
        $this->addSql('CREATE INDEX IDX_F0FE252720AEF35F ON cart_item (cart_id_id)');
        $this->addSql('CREATE TEMPORARY TABLE __temp__product AS SELECT id, title, price, description FROM product');
        $this->addSql('DROP TABLE product');
        $this->addSql('CREATE TABLE product (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, title VARCHAR(255) NOT NULL, price NUMERIC(10, 2) NOT NULL, description VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO product (id, title, price, description) SELECT id, title, price, description FROM __temp__product');
        $this->addSql('DROP TABLE __temp__product');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE cart');
        $this->addSql('DROP TABLE cart_item');
        $this->addSql('CREATE TEMPORARY TABLE __temp__product AS SELECT id, title, price, description FROM product');
        $this->addSql('DROP TABLE product');
        $this->addSql('CREATE TABLE product (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, title VARCHAR(255) NOT NULL, price NUMERIC(10, 2) NOT NULL, description VARCHAR(255) DEFAULT \'" "\' NOT NULL)');
        $this->addSql('INSERT INTO product (id, title, price, description) SELECT id, title, price, description FROM __temp__product');
        $this->addSql('DROP TABLE __temp__product');
    }
}
