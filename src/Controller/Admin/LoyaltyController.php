<?php
namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\LoyaltyConfigRepository;
use App\Repository\LoyaltyPointsRepository;
use Doctrine\ORM\EntityManagerInterface;

class LoyaltyController extends AbstractController
{
    #[Route('/admin/loyalty', name: 'admin_loyalty')]
    public function index(Request $request, LoyaltyConfigRepository $configRepo, LoyaltyPointsRepository $pointsRepo, EntityManagerInterface $em): Response
    {
        // Defensive: repository calls may fail if the schema hasn't been created yet.
        try {
            $current = $configRepo->getIntValue('points_per_order', 10);
        } catch (\Throwable $e) {
            $current = 10; // fallback default
        }

        if ($request->isMethod('POST')) {
            $value = (int) $request->request->get('points_per_order', 10);
            try {
                $cfg = $configRepo->findOneByName('points_per_order');
                if (!$cfg) {
                    $cfg = new \App\Entity\LoyaltyConfig('points_per_order', $value);
                    $em->persist($cfg);
                } else {
                    $cfg->setIntValue($value);
                }
                $em->flush();
                $this->addFlash('success', 'Points per order updated.');
            } catch (\Throwable $e) {
                $this->addFlash('error', 'Unable to update config: database schema may be missing.');
            }

            return $this->redirectToRoute('admin_loyalty');
        }

        try {
            $records = $pointsRepo->findAll();
        } catch (\Throwable $e) {
            $records = [];
        }

        return $this->render('admin/loyalty/list.html.twig', [
            'current' => $current,
            'records' => $records,
        ]);
    }

    #[Route('/admin/loyalty/list', name: 'admin_loyalty_list')]
    #[Route('/admin_loyalty_list', name: 'admin_loyalty_list_alias')]
    public function list(LoyaltyConfigRepository $configRepo, LoyaltyPointsRepository $pointsRepo): Response
    {
        $current = $configRepo->getIntValue('points_per_order', 10);
        $records = $pointsRepo->findAll();
        return $this->render('admin/loyalty/list.html.twig', [
            'current' => $current,
            'records' => $records,
        ]);
    }
}
