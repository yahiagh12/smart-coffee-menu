# 📊 Structure de la Base de Données SQLite3

## Vue d'ensemble

La base de données SQLite3 contient 4 tables principales pour gérer le café virtuel:

```
users (Utilisateurs)
  ├── id (INTEGER PRIMARY KEY)
  ├── email (VARCHAR UNIQUE)
  ├── roles (JSON)
  ├── password (VARCHAR)
  ├── first_name (VARCHAR)
  ├── last_name (VARCHAR)
  ├── phone (VARCHAR)
  ├── address (TEXT)
  ├── is_active (BOOLEAN)
  └── created_at (DATETIME)

categories (Catégories)
  ├── id (INTEGER PRIMARY KEY)
  ├── name (VARCHAR)
  └── description (TEXT)

products (Produits)
  ├── id (INTEGER PRIMARY KEY)
  ├── name (VARCHAR)
  ├── description (TEXT)
  ├── price (DECIMAL 10,2)
  ├── stock (INTEGER)
  ├── is_available (BOOLEAN)
  ├── category_id (FK → categories)
  ├── image (VARCHAR)
  └── created_at (DATETIME)

orders (Commandes)
  ├── id (INTEGER PRIMARY KEY)
  ├── user_id (FK → users)
  ├── total_price (DECIMAL 10,2)
  ├── status (VARCHAR: pending, preparing, ready, delivered, cancelled)
  ├── items (JSON array)
  ├── notes (TEXT)
  ├── created_at (DATETIME)
  └── delivered_at (DATETIME)
```

## 📋 Détails des Tables

### 1️⃣ Utilisateurs (users)

Stocke les informations des clients et administrateurs.

```sql
CREATE TABLE users (
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
);
```

**Rôles (JSON):**
- `["ROLE_USER"]` - Client normal
- `["ROLE_ADMIN", "ROLE_USER"]` - Administrateur

**Exemple:**
```json
{
  "email": "client@email.com",
  "roles": ["ROLE_USER"],
  "first_name": "Jean",
  "last_name": "Dupont",
  "phone": "06 12 34 56 78",
  "address": "123 Rue de Paris",
  "is_active": true
}
```

### 2️⃣ Catégories (categories)

Organisent les produits du menu.

```sql
CREATE TABLE categories (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name VARCHAR(255) NOT NULL,
    description TEXT
);
```

**Catégories pré-insérées:**
- Cafés
- Pâtisseries
- Desserts
- Boissons

### 3️⃣ Produits (products)

Tous les articles du menu du café.

```sql
CREATE TABLE products (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    stock INTEGER NOT NULL DEFAULT 0,
    is_available BOOLEAN NOT NULL DEFAULT 1,
    category_id INTEGER NOT NULL,
    image VARCHAR(255),
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(id)
);
```

**Produits pré-insérés:**

**Cafés (6):**
- Espresso (2.50€)
- Cappuccino (3.50€)
- Latte (3.75€)
- Americano (2.75€)
- Macchiato (3.25€)
- Café Froid (3.50€)

**Pâtisseries (6):**
- Croissant (2.00€)
- Pain au Chocolat (2.25€)
- Éclair (2.50€)
- Muffin (2.00€)
- Macaron (1.50€)
- Brownie (2.75€)

**Desserts (3):**
- Tiramisu (4.50€)
- Tarte aux Fruits (3.75€)
- Cheesecake (4.25€)

**Boissons (3):**
- Chocolat Chaud (3.00€)
- Thé (2.50€)
- Jus de Fruit (2.75€)

### 4️⃣ Commandes (orders)

Historique des commandes des clients.

```sql
CREATE TABLE orders (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    user_id INTEGER NOT NULL,
    total_price DECIMAL(10,2) NOT NULL,
    status VARCHAR(50) NOT NULL DEFAULT "pending",
    items JSON NOT NULL,
    notes TEXT,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    delivered_at DATETIME,
    FOREIGN KEY (user_id) REFERENCES users(id)
);
```

**Statuts de commande:**
- `pending` - En attente
- `preparing` - En préparation
- `ready` - Prêt
- `delivered` - Livré
- `cancelled` - Annulé

**Format des items (JSON):**
```json
[
  {
    "product_id": 1,
    "name": "Espresso",
    "quantity": 2,
    "price": 2.50,
    "subtotal": 5.00
  },
  {
    "product_id": 8,
    "name": "Croissant",
    "quantity": 1,
    "price": 2.00,
    "subtotal": 2.00
  }
]
```

## 🔍 Requêtes Utiles SQLite3

### Lister tous les utilisateurs
```sql
SELECT id, email, first_name, last_name, is_active FROM users;
```

### Lister les produits par catégorie
```sql
SELECT p.id, p.name, p.price, p.stock, c.name as category
FROM products p
JOIN categories c ON p.category_id = c.id
WHERE c.name = 'Cafés';
```

### Voir les commandes en attente
```sql
SELECT o.id, u.email, o.total_price, o.status, o.created_at
FROM orders o
JOIN users u ON o.user_id = u.id
WHERE o.status = 'pending'
ORDER BY o.created_at DESC;
```

### Statistiques de ventes
```sql
SELECT 
  c.name as category,
  COUNT(p.id) as product_count,
  AVG(p.price) as avg_price,
  SUM(p.stock) as total_stock
FROM categories c
LEFT JOIN products p ON c.id = p.category_id
GROUP BY c.id;
```

### Total des revenus
```sql
SELECT 
  SUM(total_price) as total_revenue,
  COUNT(*) as total_orders,
  AVG(total_price) as avg_order_value
FROM orders
WHERE status = 'delivered';
```

## 📥 Ajouter une Commande en SQL

```sql
INSERT INTO orders (user_id, total_price, status, items, notes)
VALUES (
  1,
  7.50,
  'pending',
  '[{"product_id": 1, "name": "Espresso", "quantity": 2, "price": 2.50, "subtotal": 5.00}, {"product_id": 8, "name": "Croissant", "quantity": 1, "price": 2.00, "subtotal": 2.00}]',
  'Pas de sucre'
);
```

## 🔐 Utilisateurs de Test

**Admin (administrateur):**
- Email: `admin@cafe.com`
- Rôles: `ROLE_ADMIN`, `ROLE_USER`

**Client 1:**
- Email: `client1@email.com`
- Rôles: `ROLE_USER`

**Client 2:**
- Email: `client2@email.com`
- Rôles: `ROLE_USER`

## 📂 Accès à la Base de Données

### Via SQLite3 CLI
```bash
# Ouvrir la base de données
sqlite3 var/app.db

# Voir les tables
.tables

# Voir le schéma d'une table
.schema users

# Exécuter une requête
SELECT * FROM products;
```

### Via une Application GUI
- **SQLite Browser:** https://sqlitebrowser.org/
- **DBeaver:** https://dbeaver.io/
- **VS Code SQLite Extension**

## 🔄 Migrations

Les migrations sont stockées dans `migrations/`:

```bash
# Voir l'état des migrations
php bin/console doctrine:migrations:status

# Exécuter les migrations
php bin/console doctrine:migrations:migrate

# Annuler une migration
php bin/console doctrine:migrations:migrate prev

# Créer une nouvelle migration
php bin/console make:migration
```

## 💾 Sauvegarde

Pour sauvegarder la base de données SQLite:
```bash
# Copier le fichier
cp var/app.db var/app.db.backup

# Ou utiliser SQLite
sqlite3 var/app.db ".backup var/app.db.backup"
```

---

**Location du fichier de base de données:** `var/app.db`

Pour plus d'informations sur SQLite: https://www.sqlite.org/docs.html
