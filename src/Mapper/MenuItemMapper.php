<?php

namespace App\Mapper;

use App\Entity\MenuItem;

class MenuItemMapper
{
    public static function toArray(MenuItem $m): array
    {
        return [
            'id' => $m->getId(),
            'name' => $m->getName(),
            'price' => $m->getPrice(),
            'description' => $m->getDescription(),
            'categorie' => $m->getCategorie()?->getId(),
        ];
    }
}
