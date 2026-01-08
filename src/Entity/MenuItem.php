<?php
namespace App\Entity;

use App\Repository\MenuItemRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MenuItemRepository::class)]
class MenuItem
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255)]
    private string $name;

    #[ORM\Column(type: 'float')]
    private float $price = 0.0;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $description = null;


    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $image = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $fidelityPoints = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $pointsRedeemPrice = null;

    #[ORM\ManyToOne(targetEntity: Categorie::class, inversedBy: 'menuItems')]
    #[ORM\JoinColumn(nullable: true, onDelete: 'SET NULL')]
    private ?Categorie $categorie = null;

    #[ORM\Column(type: 'boolean', options: ['default' => true])]
    private bool $available = true;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;
        return $this;
    }

    public function getFidelityPoints(): ?int
    {
        return $this->fidelityPoints;
    }

    public function setFidelityPoints(?int $points): self
    {
        $this->fidelityPoints = $points;
        return $this;
    }

    public function getPointsRedeemPrice(): ?int
    {
        return $this->pointsRedeemPrice;
    }

    public function setPointsRedeemPrice(?int $price): self
    {
        $this->pointsRedeemPrice = $price;
        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;
        return $this;
    }

    public function isAvailable(): bool
    {
        return $this->available;
    }

    public function setAvailable(bool $available): self
    {
        $this->available = $available;
        return $this;
    }
}
