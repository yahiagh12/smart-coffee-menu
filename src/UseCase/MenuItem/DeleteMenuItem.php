<?php
namespace App\UseCase\MenuItem;

use App\Repository\MenuItemRepository;
use Doctrine\ORM\EntityManagerInterface;

class DeleteMenuItem
{
    public function __construct(private EntityManagerInterface $em, private MenuItemRepository $repo)
    {
    }

    /**
     * Delete by id. Returns true if deleted, false if not found.
     */
    public function execute(int $id): bool
    {
        $m = $this->repo->find($id);
        if (!$m) {
            return false;
        }

        $this->em->remove($m);
        $this->em->flush();

        return true;
    }

}
