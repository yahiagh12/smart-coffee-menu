<?php
namespace App\UseCase\MenuItem;

use App\Dto\MenuItem\MenuItemInput;
use App\Entity\MenuItem;
use App\Mapper\MenuItemMapper;
use App\Repository\MenuItemRepository;
use App\Repository\CategorieRepository;
use Doctrine\ORM\EntityManagerInterface;

class CreateMenuItem
{
    public function __construct(
        private EntityManagerInterface $em,
        private MenuItemRepository $repo,
        private CategorieRepository $categorieRepo
    ) {}

    /**
     * Create a menu item from DTO and return mapped array
     */
    public function execute(MenuItemInput $input): array
    {
        $m = new MenuItem();

        if ($input->name !== null) {
            $m->setName($input->name);
        }
        if ($input->price !== null) {
            $m->setPrice((float) $input->price);
        }
        if ($input->description !== null) {
            $m->setDescription($input->description);
        }

        if (!empty($input->categorie)) {
            $cat = $this->categorieRepo->find($input->categorie);
            $m->setCategorie($cat);
        }

        $this->em->persist($m);
        $this->em->flush();

        return MenuItemMapper::toArray($m);
    }

}
