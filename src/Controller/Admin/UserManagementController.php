<?php

namespace App\Controller\Admin;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/users', name: 'admin_users_')]
class UserManagementController extends AbstractController
{
    #[Route('/', name: 'list')]
    public function list(): Response
    {
        return $this->render('admin/users/list.html.twig', [
            'title' => 'Gestion des Utilisateurs'
        ]);
    }

    #[Route('/{id}/edit', name: 'edit')]
    public function edit(User $user): Response
    {
        return $this->render('admin/users/edit.html.twig', [
            'user' => $user,
            'title' => 'Éditer Utilisateur'
        ]);
    }

    #[Route('/{id}/delete', name: 'delete', methods: ['POST'])]
    public function delete(User $user, Request $request): Response
    {
        if ($this->isCsrfTokenValid('delete' . $user->getId(), $request->request->get('_token'))) {
            // Delete user logic here
        }

        return $this->redirectToRoute('admin_users_list');
    }
}
