# 🔐 Système d'Authentification - Café Virtuel

## 📋 Vue d'ensemble

Le système d'authentification permet aux utilisateurs de se **connecter** et de **s'inscrire** avec les rôles suivants:

- **ROLE_USER** - Utilisateur client (peut accéder au menu et passer des commandes)
- **ROLE_ADMIN** - Administrateur (peut accéder à la dashboard complète)

## 🔑 Comptes de Test

### Admin (Administrateur)
- **Email:** `admin@cafe.com`
- **Mot de passe:** `password`
- **Accès:** `/admin` Dashboard
- **Rôles:** ROLE_ADMIN, ROLE_USER

### Client 1
- **Email:** `client1@email.com`
- **Mot de passe:** `password`
- **Accès:** `/cafe` Menu Client
- **Rôles:** ROLE_USER

### Client 2
- **Email:** `client2@email.com`
- **Mot de passe:** `password`
- **Accès:** `/cafe` Menu Client
- **Rôles:** ROLE_USER

## 📄 Pages d'Authentification

### Page d'Accueil
**URL:** `http://localhost:8000/`
- Page de bienvenue
- Boutons "Se Connecter" et "S'Inscrire"

### Connexion (Login)
**URL:** `http://localhost:8000/login`
- Formulaire avec Email et Mot de passe
- Liens vers inscription
- Affichage des comptes de test
- Redirection automatique après connexion réussie

### Inscription (Register)
**URL:** `http://localhost:8000/register`
- Formulaire avec:
  - Prénom
  - Nom
  - Email
  - Téléphone (optionnel)
  - Mot de passe
  - Confirmation du mot de passe
- Validation côté serveur
- Création automatique en base de données
- Redirection vers login après inscription

### Déconnexion (Logout)
**URL:** `http://localhost:8000/logout`
- Efface la session
- Redirection vers la page d'accueil

## 🏃 Flux de Navigation

```
Accueil (/)
├── Se Connecter (/login)
│   ├── Email + Mot de passe
│   └── Redirection vers Dashboard (Admin) ou Menu (Client)
└── S'Inscrire (/register)
    └── Formulaire d'inscription
        └── Redirection vers Login

Menu Client (/cafe)
├── Protégé - Redirection vers login si non connecté
└── Déconnexion (/logout)

Dashboard Admin (/admin)
├── Protégé - Redirection vers login si non connecté
└── Déconnexion (/logout)
```

## 🔒 Protection des Routes

Les routes suivantes sont protégées et nécessitent une session valide:

- `/cafe` - Menu client
- `/admin` et sous-routes - Dashboard admin
- `/admin/users` - Gestion utilisateurs
- `/admin/menu` - Gestion menu
- `/admin/orders` - Gestion commandes

## 🛡️ Sécurité

### Hachage des Mots de Passe
- **Algorithme:** Bcrypt (PHP 8.2+)
- **Coût:** 13
- **Stockage:** Colonne `password` en base de données

### Validation
- Email valide et unique
- Mot de passe minimum 6 caractères
- Confirmation du mot de passe lors de l'inscription
- Vérification du compte actif lors de la connexion

### Session
Les données suivantes sont stockées dans la session utilisateur:
- `user_id` - ID de l'utilisateur
- `user_email` - Email de l'utilisateur
- `user_roles` - Rôles (tableau JSON)
- `user_name` - Prénom + Nom

## 📝 Contrôleurs

### HomeController
- `GET /` - Page d'accueil
- `GET /home` - Page d'accueil (alias)

### LoginController
- `GET /login` - Affiche formulaire de connexion
- `POST /login` - Traite la connexion
- `GET /logout` - Déconnexion

### RegisterController
- `GET /register` - Affiche formulaire d'inscription
- `POST /register` - Traite l'inscription

### AdminDashboardController
- `GET /admin` - Dashboard (protégé)

### CafeVirtuelController
- `GET /cafe` - Menu client (protégé)

## 🗄️ Entité User

```php
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    private int $id;
    private string $email;           // Unique
    private array $roles;             // JSON
    private string $password;         // Hashed
    private string $firstName;
    private string $lastName;
    private ?string $phone;
    private ?string $address;
    private bool $isActive;
    private DateTimeImmutable $createdAt;
}
```

## 📊 Migrations

Les migrations nécessaires pour l'authentification:

1. **Version20250112000000** - Crée les tables (users, categories, products, orders)
2. **Version20250112000001** - Insère les données de test
3. **Version20250112000002** - Hache les mots de passe des comptes de test

## 🧪 Tests Manuels

### Test 1: Connexion Admin
1. Aller à `/login`
2. Email: `admin@cafe.com`
3. Mot de passe: `password`
4. Vérifier redirection vers `/admin`

### Test 2: Connexion Client
1. Aller à `/login`
2. Email: `client1@email.com`
3. Mot de passe: `password`
4. Vérifier redirection vers `/cafe`

### Test 3: Inscription
1. Aller à `/register`
2. Remplir le formulaire
3. Soumettre
4. Vérifier redirection vers `/login` avec message de succès

### Test 4: Déconnexion
1. Se connecter
2. Cliquer sur "Déconnexion"
3. Vérifier retour à `/`

### Test 5: Accès non autorisé
1. Essayer d'accéder à `/admin` sans connexion
2. Vérifier redirection vers `/login`

## 🔧 Débogage

### Vérifier les utilisateurs en BDD
```bash
php verify_db.php
```

Ou en SQL:
```sql
SELECT id, email, roles, is_active FROM users;
```

### Effacer une session
Les sessions sont gérées côté serveur (dans les cookies du navigateur).
- Effacer les cookies du navigateur
- Ou accéder à `/logout`

### Réinitialiser les mots de passe
```bash
php bin/console doctrine:migrations:migrate
```

## 🚀 Prochaines Étapes

- [ ] Ajouter confirmation d'email
- [ ] Ajouter "Mot de passe oublié"
- [ ] Ajouter authentification à deux facteurs (2FA)
- [ ] Ajouter OAuth (Google, GitHub)
- [ ] Enregistrer l'historique de connexion
- [ ] Ajouter CSRF protection sur les formulaires
- [ ] Limiter les tentatives de connexion échouées

---

**Documentation créée le 12 janvier 2025** ☕
