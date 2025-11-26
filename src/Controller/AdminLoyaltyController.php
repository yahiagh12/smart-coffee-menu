<?php
namespace App\Controller;

use App\Entity\LoyaltyConfig;
use App\Repository\LoyaltyConfigRepository;
use App\Repository\LoyaltyPointsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminLoyaltyController extends AbstractController
{
    #[Route('/admin/loyalty', name: 'admin_loyalty')]
    public function index(Request $request, LoyaltyConfigRepository $configRepo, LoyaltyPointsRepository $pointsRepo, EntityManagerInterface $em): Response
    {
        $current = $configRepo->getIntValue('points_per_order', 10);

        if ($request->isMethod('POST')) {
            $value = (int) $request->request->get('points_per_order', 10);

            $cfg = $configRepo->findOneByName('points_per_order');
            if (!$cfg) {
                $cfg = new LoyaltyConfig('points_per_order', $value);
                $em->persist($cfg);
            } else {
                $cfg->setIntValue($value);
            }
            $em->flush();
            $this->addFlash('success', 'Points per order updated.');
            return $this->redirectToRoute('admin_loyalty');
        }

        // fetch loyalty records to display in the admin table
        $records = $pointsRepo->findAll();

        return $this->render('admin/loyalty/list.html.twig', [
            'current' => $current,
            'records' => $records,
        ]);
    }
}
