# ☕ Café Virtuel - Projet Symfony

Un projet complet de café virtuel avec une **interface client** et une **dashboard admin**.

## 🎯 Caractéristiques

### 👥 **Interface Client**
- ✅ Menu complet (Cafés, Pâtisseries, Desserts)
- 🛒 Panier fonctionnel
- 📱 Design responsive
- 💬 Section À Propos et Contact

### 👨‍💼 **Dashboard Admin**
- 📊 Tableau de bord avec statistiques
- 👥 Gestion des utilisateurs
- 🍰 Gestion du menu et catégories
- 📦 Gestion des commandes
- 📈 Suivi des activités

## 📋 Prérequis

- **PHP 8.2+**
- **Composer** - [Télécharger](https://getcomposer.org/)
- **Docker & Docker Compose** (optionnel) - [Télécharger](https://www.docker.com/)
- **PostgreSQL 16** (si pas de Docker)

## 🚀 Installation Rapide

### 1. Cloner le projet
```bash
git clone <repository-url>
cd smart-coffee-menu
```

### 2. Installer les dépendances
```bash
composer install
```

### 3. Configurer la base de données

#### Option A: Avec Docker (Recommandé)
```bash
docker-compose up -d
```

#### Option B: Sans Docker
Assurez-vous que PostgreSQL est installé et en cours d'exécution, puis mettez à jour le fichier `.env`:
```
DATABASE_URL="postgresql://postgres:your_password@127.0.0.1:5432/app?serverVersion=16&charset=utf8"
```

### 4. Créer la base de données
```bash
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
```

### 5. Lancer le serveur de développement

**Avec Symfony CLI:**
```bash
symfony server:start
```

**Ou avec PHP:**
```bash
php -S 127.0.0.1:8000 -t public
```

## 🌐 Accès à l'Application

- **Page Client:** http://localhost:8000
- **Admin Dashboard:** http://localhost:8000/admin
- **Gestion Utilisateurs:** http://localhost:8000/admin/users
- **Gestion Menu:** http://localhost:8000/admin/menu
- **Gestion Commandes:** http://localhost:8000/admin/orders

## 📁 Structure du Projet

```
src/
├── Controller/
│   ├── CafeVirtuelController.php      # Routes client
│   └── Admin/
│       ├── AdminDashboardController.php
│       ├── UserManagementController.php
│       ├── MenuManagementController.php
│       └── OrderManagementController.php
├── Entity/
│   ├── User.php
│   ├── Product.php
│   ├── Category.php
│   └── Order.php
└── Repository/

templates/
├── base.html.twig                     # Layout de base
├── cafe_virtuel_client.html.twig      # Page client
├── cafe_virtuel.html.twig             # Template ancien (backup)
└── admin/
    ├── base.html.twig                 # Layout admin
    ├── dashboard.html.twig            # Dashboard
    ├── users/
    │   └── list.html.twig
    ├── menu/
    │   ├── list.html.twig
    │   ├── form.html.twig
    │   └── categories.html.twig
    └── orders/
        ├── list.html.twig
        └── detail.html.twig
```

## 🛠️ Commandes Utiles

### Doctrine
```bash
# Créer la base de données
php bin/console doctrine:database:create

# Exécuter les migrations
php bin/console doctrine:migrations:migrate

# Créer une nouvelle migration
php bin/console make:migration

# Vider la base de données
php bin/console doctrine:database:drop --force
```

### Docker
```bash
# Démarrer les conteneurs
docker-compose up -d

# Arrêter les conteneurs
docker-compose down

# Voir les logs
docker-compose logs -f
```

### Symfony
```bash
# Lancer le serveur
symfony server:start

# Arrêter le serveur
symfony server:stop

# Vider le cache
php bin/console cache:clear

# Voir les routes
php bin/console debug:router
```

## 📝 Entités

### User
- Email (unique)
- Mot de passe
- Prénom/Nom
- Téléphone
- Adresse
- Rôles (ROLE_USER, ROLE_ADMIN)
- Statut (Actif/Inactif)
- Date de création

### Product
- Nom
- Description
- Prix
- Stock
- Catégorie
- Image
- Disponibilité

### Category
- Nom
- Description
- Produits associés

### Order
- Client
- Articles commandés
- Prix total
- Statut (pending, preparing, ready, delivered, cancelled)
- Notes
- Date de création

## 🎨 Personnalisation

### Couleurs
Les couleurs du café sont définies dans les fichiers Twig:
- Brun principal: `#8B4513`
- Brun clair: `#A0522D`
- Brun foncé: `#D2691E`

Modifiez ces valeurs dans les fichiers CSS pour changer le thème.

### Menu
Les articles du menu sont actuellement en dur dans le template. Pour les rendre dynamiques, connectez-les à la base de données via les contrôleurs.

## 🔒 Sécurité

- Les mots de passe doivent être hashés (utiliser `PasswordHasherInterface`)
- Implémenter une authentification Symfony
- Ajouter des rôles (ROLE_ADMIN, ROLE_USER)
- Vérifier les permissions dans les contrôleurs

## 📊 Prochaines Étapes

- [ ] Implémenter l'authentification complète
- [ ] Ajouter la persistance des données en base de données
- [ ] Intégrer un système de paiement
- [ ] Ajouter des tests unitaires
- [ ] Implémenter les notifications en temps réel
- [ ] Ajouter un système de réservation de tables

## 💡 Support

Pour toute question ou problème, veuillez créer une issue sur le dépôt.

---

**Développé avec ❤️ pour les amateurs de café** ☕
