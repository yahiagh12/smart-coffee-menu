<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class ClientController extends AbstractController
{
    #[Route('/client', name: 'client_home')]
    public function index(): Response
    {
        $user = $this->getUser();
        $client = [];
        if ($user) {
            $client = [
                'name' => method_exists($user, 'getName') ? $user->getName() : (method_exists($user, 'getUserIdentifier') ? $user->getUserIdentifier() : ''),
                'email' => method_exists($user, 'getEmail') ? $user->getEmail() : (method_exists($user, 'getUserIdentifier') ? $user->getUserIdentifier() : ''),
                'phone' => method_exists($user, 'getPhone') ? $user->getPhone() : null,
                'picture' => method_exists($user, 'getPicture') ? $user->getPicture() : null,
                'loyalty_points' => method_exists($user, 'getFidelite') ? $user->getFidelite() : 0,
            ];
        }

        return $this->render('client/account.html.twig', ['client' => $client]);
    }
}
