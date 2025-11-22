<?php

namespace App\Dto\MenuItem;

class MenuItemInput
{
    public ?string $name = null;
    public ?float $price = null;
    public ?string $description = null;
    public ?int $categorie = null;

    public static function fromArray(array $data): self
    {
        $dto = new self();
        $dto->name = $data['name'] ?? null;
        $dto->price = isset($data['price']) ? (float) $data['price'] : null;
        $dto->description = $data['description'] ?? null;
        $dto->categorie = isset($data['categorie']) ? (int)$data['categorie'] : null;
        return $dto;
    }
}
