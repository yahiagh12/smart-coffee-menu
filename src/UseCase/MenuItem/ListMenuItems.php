<?php
namespace App\UseCase\MenuItem;

use App\Mapper\MenuItemMapper;
use App\Repository\MenuItemRepository;

class ListMenuItems
{
    public function __construct(private MenuItemRepository $repo)
    {
    }

    public function execute(): array
    {
        $items = $this->repo->findAll();
        return array_map(fn($m) => MenuItemMapper::toArray($m), $items);
    }
}
