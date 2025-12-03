<?php
namespace App\Entity;

use App\Repository\EventRequestRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EventRequestRepository::class)]
class EventRequest
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Event::class)]
    #[ORM\JoinColumn(nullable: true, onDelete: 'CASCADE')]
    private ?Event $event = null;

    #[ORM\Column(type: 'string', length: 255)]
    private string $name;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $message = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $image = null;

    #[ORM\Column(type: 'datetime_immutable')]
    private \DateTimeInterface $created;

    public function __construct()
    {
        $this->created = new \DateTimeImmutable();
    }

    public function getId(): ?int { return $this->id; }

    public function getEvent(): ?Event { return $this->event; }
    public function setEvent(?Event $e): self { $this->event = $e; return $this; }

    public function getName(): string { return $this->name; }
    public function setName(string $n): self { $this->name = $n; return $this; }

    public function getMessage(): ?string { return $this->message; }
    public function setMessage(?string $m): self { $this->message = $m; return $this; }

    public function getImage(): ?string { return $this->image; }
    public function setImage(?string $i): self { $this->image = $i; return $this; }

    public function getCreated(): \DateTimeInterface { return $this->created; }
    public function setCreated(\DateTimeInterface $d): self { $this->created = $d; return $this; }
}
