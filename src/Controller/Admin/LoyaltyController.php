<?php
namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Repository\LoyaltyConfigRepository;
use App\Repository\LoyaltyPointsRepository;
use App\Repository\UserRepository;
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
            $raw = $request->request->get('points_per_order', null);
            // Validate integer input
            $value = 10;
            if ($raw !== null && $raw !== '') {
                $filtered = filter_var($raw, FILTER_VALIDATE_INT);
                if ($filtered !== false) {
                    $value = (int) $filtered;
                }
            }
            try {
                $cfg = $configRepo->findOneByName('points_per_order');
                if (!$cfg) {
                    $cfg = new \App\Entity\LoyaltyConfig('points_per_order', $value);
                    $em->persist($cfg);
                } else {
                    $cfg->setIntValue($value);
                }
                $em->flush();
                // Debug: log the update to the project's var/log so we can inspect what's happening
                try {
                    $logDir = $this->getParameter('kernel.project_dir') . '/var/log';
                    if (!is_dir($logDir)) @mkdir($logDir, 0777, true);
                    @file_put_contents($logDir . '/loyalty_debug.log', sprintf("%s - updated points_per_order to %s\n", date('c'), var_export($value, true)), FILE_APPEND);
                } catch (\Throwable $e) {
                    // ignore logging errors
                }
                $this->addFlash('success', 'Points per order updated.');
                // If request was AJAX, return JSON so client can update without reload
                if ($request->isXmlHttpRequest()) {
                    return new JsonResponse(['current' => $value, 'debug' => 'updated']);
                }
            } catch (\Throwable $e) {
                $this->addFlash('error', 'Unable to update config: database schema may be missing.');
                try {
                    @file_put_contents(__DIR__ . '/../../var/log/loyalty_debug.log', sprintf("%s - update failed: %s\n", date('c'), (string) $e->getMessage()), FILE_APPEND);
                } catch (\Throwable $e2) {}
                if ($request->isXmlHttpRequest()) {
                    return new JsonResponse(['error' => 'Unable to update config', 'exception' => (string)$e->getMessage()], 500);
                }
            }

            return $this->redirectToRoute('admin_loyalty');
        }

        try {
            $records = $pointsRepo->findAll();
        } catch (\Throwable $e) {
            $records = [];
        }

        // Fetch all clients and their loyalty points
        $recordsWithNames = [];
        try {
            $userRepo = $em->getRepository(\App\Entity\User::class);
            // Get all users with ROLE_CLIENT
            $clients = $userRepo->createQueryBuilder('u')
                ->where('u.roles LIKE :role')
                ->setParameter('role', '%ROLE_CLIENT%')
                ->orderBy('u.name', 'ASC')
                ->getQuery()
                ->getResult();
            
            foreach ($clients as $user) {
                $email = $user->getEmail();
                // Find loyalty points for this client, or create empty one
                $loyaltyRecord = $pointsRepo->findOneByClientIdentifier($email);
                if (!$loyaltyRecord) {
                    // Create a temporary loyalty record for display (0 points)
                    $loyaltyRecord = new \App\Entity\LoyaltyPoints($email);
                    $loyaltyRecord->setPoints(0);
                }
                
                $recordsWithNames[] = [
                    'record' => $loyaltyRecord,
                    'userName' => $user->getName(),
                ];
            }
        } catch (\Throwable $e) {
            // Fallback if user lookup fails
            $recordsWithNames = [];
        }

        return $this->render('admin/loyalty/list.html.twig', [
            'current' => $current,
            'records' => $recordsWithNames,
        ]);
    }

    #[Route('/admin/loyalty/list', name: 'admin_loyalty_list')]
    #[Route('/admin_loyalty_list', name: 'admin_loyalty_list_alias')]
    public function list(LoyaltyConfigRepository $configRepo, LoyaltyPointsRepository $pointsRepo, EntityManagerInterface $em): Response
    {
        $current = $configRepo->getIntValue('points_per_order', 10);
        
        // Fetch all clients and their loyalty points
        $recordsWithNames = [];
        try {
            $userRepo = $em->getRepository(\App\Entity\User::class);
            // Get all users with ROLE_CLIENT
            $clients = $userRepo->createQueryBuilder('u')
                ->where('u.roles LIKE :role')
                ->setParameter('role', '%ROLE_CLIENT%')
                ->orderBy('u.name', 'ASC')
                ->getQuery()
                ->getResult();
            
            foreach ($clients as $user) {
                $email = $user->getEmail();
                // Find loyalty points for this client, or create empty one
                $loyaltyRecord = $pointsRepo->findOneByClientIdentifier($email);
                if (!$loyaltyRecord) {
                    // Create a temporary loyalty record for display (0 points)
                    $loyaltyRecord = new \App\Entity\LoyaltyPoints($email);
                    $loyaltyRecord->setPoints(0);
                }
                
                $recordsWithNames[] = [
                    'record' => $loyaltyRecord,
                    'userName' => $user->getName(),
                ];
            }
        } catch (\Throwable $e) {
            // Fallback if user lookup fails
            $recordsWithNames = [];
        }
        
        return $this->render('admin/loyalty/list.html.twig', [
            'current' => $current,
            'records' => $recordsWithNames,
        ]);
    }
}
