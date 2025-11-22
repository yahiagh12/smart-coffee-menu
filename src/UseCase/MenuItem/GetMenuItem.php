<?php
namespace App\UseCase\MenuItem;

use App\Mapper\MenuItemMapper;
use App\Repository\MenuItemRepository;

class GetMenuItem
{
    public function __construct(private MenuItemRepository $repo)
    {
    }

    /**
     * @return array|null   
     */
    public function execute(int $id): ?array
    {
        $m = $this->repo->find($id);
        if (!$m) {
            return null;
        }

        return MenuItemMapper::toArray($m);
    }
}
