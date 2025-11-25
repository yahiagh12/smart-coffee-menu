<?php
namespace App\Entity;

use App\Repository\LoyaltyConfigRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LoyaltyConfigRepository::class)]
class LoyaltyConfig
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 100, unique: true)]
    private string $name;

    #[ORM\Column(type: 'integer')]
    private int $intValue = 0;

    public function __construct(string $name = '', int $intValue = 0)
    {
        $this->name = $name;
        $this->intValue = $intValue;
    }

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

    public function getIntValue(): int
    {
        return $this->intValue;
    }

    public function setIntValue(int $intValue): self
    {
        $this->intValue = $intValue;
        return $this;
    }
}
