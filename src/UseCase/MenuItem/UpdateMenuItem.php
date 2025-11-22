<?php
namespace App\UseCase\MenuItem;

use App\Dto\MenuItem\MenuItemInput;
use App\Mapper\MenuItemMapper;
use App\Repository\MenuItemRepository;
use App\Repository\CategorieRepository;
use Doctrine\ORM\EntityManagerInterface;

class UpdateMenuItem
{
    public function __construct(
        private EntityManagerInterface $em,
        private MenuItemRepository $repo,
        private CategorieRepository $categorieRepo
    ) {}

    /**
     * Update menu item and return mapped array, or null if not found
     */
    public function execute(int $id, MenuItemInput $input): ?array
    {
        $m = $this->repo->find($id);
        if (!$m) {
            return null;
        }

        if ($input->name !== null) {
            $m->setName($input->name);
        }
        if ($input->price !== null) {
            $m->setPrice((float)$input->price);
        }
        if ($input->description !== null) {
            $m->setDescription($input->description);
        }
        if ($input->categorie !== null) {
            $cat = $this->categorieRepo->find($input->categorie);
            $m->setCategorie($cat);
        }

        $this->em->flush();

        return MenuItemMapper::toArray($m);
    }

}
