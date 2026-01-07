<?php
namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieRepository::class)]
class Categorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255)]
    private string $name;

    /**
     * @var Collection<int, MenuItem>
     */
    #[ORM\OneToMany(mappedBy: 'categorie', targetEntity: MenuItem::class, cascade: ['persist', 'remove'])]
    private Collection $menuItems;

    public function __construct(string $name = '')
    {
        $this->name = $name;
        $this->menuItems = new ArrayCollection();
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

    /**
     * @return Collection<int, MenuItem>
     */
    public function getMenuItems(): Collection
    {
        return $this->menuItems;
    }

    public function addMenuItem(MenuItem $item): self
    {
        if (!$this->menuItems->contains($item)) {
            $this->menuItems->add($item);
            $item->setCategorie($this);
        }

        return $this;
    }

    public function removeMenuItem(MenuItem $item): self
    {
        if ($this->menuItems->removeElement($item)) {
            if ($item->getCategorie() === $this) {
                $item->setCategorie(null);
            }
        }

        return $this;
    }
}
