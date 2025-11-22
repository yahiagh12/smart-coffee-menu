<?php

namespace App\Entity;

use Symfony\Component\Security\Core\User\UserInterface;

class User implements UserInterface
{
    private int $id;
    private string $nom;
    private string $prenom;
    private string $adresse;
    private string $email;
    private string $type; // 'admin', 'traiteur', or 'client'
    private string $password;

    public function getId(): int { return $this->id; }
    public function setId(int $id): void { $this->id = $id; }
    public function getNom(): string { return $this->nom; }
    public function setNom(string $nom): void { $this->nom = $nom; }
    public function getPrenom(): string { return $this->prenom; }
    public function setPrenom(string $prenom): void { $this->prenom = $prenom; }
    public function getAdresse(): string { return $this->adresse; }
    public function setAdresse(string $adresse): void { $this->adresse = $adresse; }
    public function getEmail(): string { return $this->email; }
    public function setEmail(string $email): void { $this->email = $email; }
    public function getType(): string { return $this->type; }
    public function setType(string $type): void {
        if (!in_array($type, ['admin', 'traiteur', 'client'])) {
            throw new \InvalidArgumentException('Type must be admin, traiteur, or client');
        }
        $this->type = $type;
    }
    public function getPassword(): string { return $this->password; }
    public function setPassword(string $password): void { $this->password = $password; }

    // UserInterface methods
    public function getRoles(): array {
        switch ($this->type) {
            case 'admin': return ['ROLE_ADMIN'];
            case 'traiteur': return ['ROLE_TRAITEUR'];
            case 'client': return ['ROLE_CLIENT'];
            default: return ['ROLE_USER'];
        }
    }
    public function getSalt(): ?string { return null; }
    public function getUsername(): string { return $this->email; }
    public function eraseCredentials(): void {}
}
