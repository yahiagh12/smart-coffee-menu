<?php
namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\LoyaltyConfigRepository;

class LoyaltyApiController extends AbstractController
{
    #[Route('/admin/loyalty/api', name: 'admin_loyalty_api', methods: ['GET','POST'])]
    public function api(Request $request, LoyaltyConfigRepository $configRepo, EntityManagerInterface $em): JsonResponse
    {
        // GET: return current value
        if ($request->isMethod('GET')) {
            try {
                $current = $configRepo->getIntValue('points_per_order', 10);
                return new JsonResponse(['current' => $current]);
            } catch (\Throwable $e) {
                return new JsonResponse(['error' => 'Unable to read config', 'exception' => (string)$e->getMessage()], 500);
            }
        }

        // POST: update
        $raw = $request->request->get('points_per_order', null);
        // Log received raw value for debugging
        try {
            $projectDir = $this->getParameter('kernel.project_dir');
            $logDir = $projectDir . '/var/log';
            if (!is_dir($logDir)) @mkdir($logDir, 0777, true);
            @file_put_contents($logDir . '/loyalty_debug.log', sprintf("%s - api received raw=%s\n", date('c'), var_export($raw, true)), FILE_APPEND);
        } catch (\Throwable $e) {}
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

            // log for debugging (best-effort) to project var/log
            try {
                $projectDir = $this->getParameter('kernel.project_dir');
                $logDir = $projectDir . '/var/log';
                if (!is_dir($logDir)) @mkdir($logDir, 0777, true);
                @file_put_contents($logDir . '/loyalty_debug.log', sprintf("%s - api updated points_per_order => %s\n", date('c'), var_export($value, true)), FILE_APPEND);
            } catch (\Throwable $e) {}

            return new JsonResponse(['current' => $value, 'debug' => 'ok']);
        } catch (\Throwable $e) {
            try {
                $projectDir = $this->getParameter('kernel.project_dir');
                $logDir = $projectDir . '/var/log';
                if (!is_dir($logDir)) @mkdir($logDir, 0777, true);
                @file_put_contents($logDir . '/loyalty_debug.log', sprintf("%s - api update failed: %s\n", date('c'), (string)$e->getMessage()), FILE_APPEND);
            } catch (\Throwable $e2) {}
            return new JsonResponse(['error' => 'Unable to update config', 'exception' => (string)$e->getMessage()], 500);
        }
    }
}
