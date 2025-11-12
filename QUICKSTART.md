# ⚡ Quick Start Guide - Café Virtuel

## 🚀 Démarrer le Projet en 2 Minutes

### 1. Lancer le Serveur

```powershell
cd c:\Users\user\smart-coffee-menu
symfony server:start
```

Ou sans Symfony CLI:
```powershell
php -S 127.0.0.1:8000 -t public
```

### 2. Accéder à l'Application

**Page d'Accueil:**
```
http://localhost:8000
```

**Se Connecter:**
```
http://localhost:8000/login
```

**S'Inscrire:**
```
http://localhost:8000/register
```

## 🔑 Comptes de Test

### Admin
```
Email:     admin@cafe.com
Mot de passe: password
Accès:     http://localhost:8000/admin
```

### Client
```
Email:     client1@email.com
Mot de passe: password
Accès:     http://localhost:8000/cafe
```

## 📋 Flux Principal

```
1. Accueil (/) 
   ↓
2. Connexion (/login) avec email et mot de passe
   ↓
3. Redirection automatique:
   - Admin → Dashboard (/admin)
   - Client → Menu (/cafe)
   ↓
4. Déconnexion (/logout)
   ↓
5. Retour à l'accueil (/)
```

## 🎯 Démonstration Rapide

### Scénario Admin
1. Ouvrir http://localhost:8000
2. Cliquer "Se Connecter"
3. Entrer `admin@cafe.com` / `password`
4. Voir le **Dashboard Admin** avec:
   - 📊 Statistiques
   - 👥 Gestion Utilisateurs
   - 🍰 Gestion Menu
   - 📦 Gestion Commandes

### Scénario Client
1. Ouvrir http://localhost:8000
2. Cliquer "Se Connecter"
3. Entrer `client1@email.com` / `password`
4. Voir le **Menu Client** avec:
   - 🍰 Tous les produits
   - 🛒 Panier fonctionnel
   - 💳 Commande en un clic

### Scénario Inscription
1. Ouvrir http://localhost:8000
2. Cliquer "S'Inscrire"
3. Remplir:
   - Prénom: Jean
   - Nom: Dupont
   - Email: jean@example.com
   - Téléphone: 06 12 34 56 78 (optionnel)
   - Mot de passe: password123
   - Confirmation: password123
4. Cliquer "Créer Mon Compte"
5. Redirection vers login
6. Se connecter avec le nouvel email

## 📚 Documentation Complète

- **README.md** - Vue d'ensemble du projet
- **DATABASE.md** - Structure de la base de données SQLite
- **AUTHENTICATION.md** - Système d'authentification complet

## 🗂️ Structure de l'Application

```
/              (Accueil)
├── /login     (Connexion)
├── /register  (Inscription)
├── /logout    (Déconnexion)
├── /cafe      (Menu Client - Protégé)
└── /admin     (Dashboard Admin - Protégé)
    ├── /users (Gestion Utilisateurs)
    ├── /menu  (Gestion Menu)
    └── /orders (Gestion Commandes)
```

## 🛠️ Commandes Utiles

```powershell
# Voir les routes disponibles
php bin/console debug:router

# Réinitialiser la base de données
php bin/console doctrine:database:drop --force
php bin/console doctrine:migrations:migrate

# Vérifier l'état des migrations
php bin/console doctrine:migrations:status

# Vider le cache
php bin/console cache:clear

# Vérifier les utilisateurs
php verify_db.php
```

## ✨ Fonctionnalités Principales

### 🔐 Authentification
- ✅ Connexion avec email/mot de passe
- ✅ Inscription avec validation
- ✅ Mots de passe hachés (Bcrypt)
- ✅ Sessions utilisateur
- ✅ Rôles (Admin/Client)

### 🍰 Menu Client
- ✅ 18 produits (Cafés, Pâtisseries, Desserts, Boissons)
- ✅ Panier fonctionnel
- ✅ Ajouter/Retirer des articles
- ✅ Calcul du total
- ✅ Passer commande

### 👨‍💼 Dashboard Admin
- ✅ Statistiques en temps réel
- ✅ Gestion utilisateurs
- ✅ Gestion menu et catégories
- ✅ Gestion commandes
- ✅ Historique d'activité

## 🐛 Troubleshooting

### "Database not found"
```powershell
php bin/console doctrine:migrations:migrate
```

### "Class not found"
```powershell
composer install
```

### "Port 8000 already in use"
```powershell
php -S 127.0.0.1:8001 -t public
```

### "Mot de passe incorrect"
Utiliser `password` (le mot de passe des comptes de test)

## 🎉 Prêt!

Vous avez maintenant une application complète de café virtuel avec:
- ✅ Authentification sécurisée
- ✅ Menu interactif
- ✅ Dashboard admin
- ✅ Base de données SQLite
- ✅ Design responsive

Bon café! ☕

---

**Version 1.0** - Janvier 2025
