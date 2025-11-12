<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Insert initial data for categories and products
 */
final class Version20250112000001 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Insert initial categories and products data';
    }

    public function up(Schema $schema): void
    {
        // Insert Categories
        $this->addSql("INSERT INTO categories (name, description) VALUES 
            ('Cafés', 'Tous nos délicieux cafés chauds et froids'),
            ('Pâtisseries', 'Pâtisseries fraîches et artisanales'),
            ('Desserts', 'Desserts délicieux et gourmands'),
            ('Boissons', 'Boissons sans caféine')");

        // Insert Products - Cafés
        $this->addSql("INSERT INTO products (name, description, price, stock, is_available, category_id) VALUES
            ('Espresso', 'Café serré et intense', 2.50, 50, 1, 1),
            ('Cappuccino', 'Café avec mousse de lait', 3.50, 45, 1, 1),
            ('Latte', 'Café crémeux au lait', 3.75, 40, 1, 1),
            ('Americano', 'Espresso allongé', 2.75, 55, 1, 1),
            ('Macchiato', 'Espresso avec trait de lait', 3.25, 35, 1, 1),
            ('Café Froid', 'Café glacé rafraîchissant', 3.50, 30, 1, 1)");

        // Insert Products - Pâtisseries
        $this->addSql("INSERT INTO products (name, description, price, stock, is_available, category_id) VALUES
            ('Croissant', 'Croissant beurre artisanal', 2.00, 40, 1, 2),
            ('Pain au Chocolat', 'Délicieux pain au chocolat', 2.25, 35, 1, 2),
            ('Éclair', 'Éclair au chocolat', 2.50, 20, 1, 2),
            ('Muffin', 'Muffin aux myrtilles', 2.00, 25, 1, 2),
            ('Macaron', 'Macaron français coloré', 1.50, 60, 1, 2),
            ('Brownie', 'Brownie au chocolat', 2.75, 30, 1, 2)");

        // Insert Products - Desserts
        $this->addSql("INSERT INTO products (name, description, price, stock, is_available, category_id) VALUES
            ('Tiramisu', 'Tiramisu traditionnel', 4.50, 15, 1, 3),
            ('Tarte aux Fruits', 'Tarte fraîche aux fruits rouges', 3.75, 10, 1, 3),
            ('Cheesecake', 'Cheesecake new-yorkais', 4.25, 12, 1, 3)");

        // Insert Products - Boissons
        $this->addSql("INSERT INTO products (name, description, price, stock, is_available, category_id) VALUES
            ('Chocolat Chaud', 'Chocolat chaud onctueux', 3.00, 30, 1, 4),
            ('Thé', 'Thé chaud assortis', 2.50, 40, 1, 4),
            ('Jus de Fruit', 'Jus frais pressé', 2.75, 35, 1, 4)");

        // Insert Test Users (1 Admin, 2 Clients)
        $this->addSql("INSERT INTO users (email, roles, password, first_name, last_name, phone, address, is_active) VALUES
            ('admin@cafe.com', '[\"ROLE_ADMIN\", \"ROLE_USER\"]', '\$2y\$13\$hashedPassword123', 'Admin', 'Café', '06 00 00 00 00', '123 Rue Admin', 1),
            ('client1@email.com', '[\"ROLE_USER\"]', '\$2y\$13\$hashedPassword456', 'Jean', 'Dupont', '06 12 34 56 78', '456 Rue Client', 1),
            ('client2@email.com', '[\"ROLE_USER\"]', '\$2y\$13\$hashedPassword789', 'Marie', 'Martin', '06 98 76 54 32', '789 Rue Client', 1)");
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DELETE FROM products');
        $this->addSql('DELETE FROM categories');
        $this->addSql('DELETE FROM users');
    }
}
