<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250112000000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create users, categories, products, and orders tables';
    }

    public function up(Schema $schema): void
    {
        // Create users table
        $this->addSql('CREATE TABLE users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            email VARCHAR(180) NOT NULL UNIQUE,
            roles JSON NOT NULL,
            password VARCHAR(255) NOT NULL,
            first_name VARCHAR(255) NOT NULL,
            last_name VARCHAR(255) NOT NULL,
            phone VARCHAR(20),
            address TEXT,
            is_active BOOLEAN NOT NULL DEFAULT 1,
            created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
        )');

        $this->addSql('CREATE INDEX idx_users_email ON users(email)');

        // Create categories table
        $this->addSql('CREATE TABLE categories (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name VARCHAR(255) NOT NULL,
            description TEXT
        )');

        // Create products table
        $this->addSql('CREATE TABLE products (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name VARCHAR(255) NOT NULL,
            description TEXT NOT NULL,
            price DECIMAL(10,2) NOT NULL,
            stock INTEGER NOT NULL DEFAULT 0,
            is_available BOOLEAN NOT NULL DEFAULT 1,
            category_id INTEGER NOT NULL,
            image VARCHAR(255),
            created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE
        )');

        $this->addSql('CREATE INDEX idx_products_category ON products(category_id)');

        // Create orders table
        $this->addSql('CREATE TABLE orders (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            user_id INTEGER NOT NULL,
            total_price DECIMAL(10,2) NOT NULL,
            status VARCHAR(50) NOT NULL DEFAULT "pending",
            items JSON NOT NULL,
            notes TEXT,
            created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
            delivered_at DATETIME,
            FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
        )');

        $this->addSql('CREATE INDEX idx_orders_user ON orders(user_id)');
        $this->addSql('CREATE INDEX idx_orders_status ON orders(status)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE IF EXISTS orders');
        $this->addSql('DROP TABLE IF EXISTS products');
        $this->addSql('DROP TABLE IF EXISTS categories');
        $this->addSql('DROP TABLE IF EXISTS users');
    }
}
