<?php
namespace App\Controller\Admin;

use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UsersController extends AbstractController
{
    #[Route('/admin/users', name: 'admin_users')]
    public function index(): Response
    {
        return $this->redirectToRoute('admin_users_list');
    }

    #[Route('/admin/users/list', name: 'admin_users_list')]
    public function list(ManagerRegistry $doctrine): Response
    {
        $users = [];
        try {
            $usersEntities = $doctrine->getRepository(User::class)->findAll();
            $users = [];
            foreach ($usersEntities as $u) {
                $users[] = [
                    'id' => $u->getId(),
                    'name' => $u->getName(),
                    'email' => $u->getEmail(),
                    'phone' => $u->getPhone(),
                    'roles' => $u->getRoles(),
                    'fidelite' => $u->getFidelite(),
                    'createdAt' => $u->getCreatedAt() ? $u->getCreatedAt()->format('Y-m-d') : null,
                ];
            }
        } catch (\Throwable $e) {
            // If the database/schema isn't ready, render page with empty list and a flash message
            $this->addFlash('warning', 'Unable to load users from database: ' . $e->getMessage());
        }

        return $this->render('admin/users/list.html.twig', ['users' => $users]);
    }

    #[Route('/admin/users/manage', name: 'admin_users_manage')]
    public function manage(Request $request, ManagerRegistry $doctrine, UserPasswordHasherInterface $passwordHasher): Response
    {
        $id = $request->query->getInt('id');

        // If GET and id provided, load user to prefill form
        $userToEdit = null;
        if ($id) {
            try {
                $userToEdit = $doctrine->getRepository(User::class)->find($id);
            } catch (\Throwable $e) {
                $this->addFlash('warning', 'Unable to load user: ' . $e->getMessage());
            }
        }

        if ($request->isMethod('POST')) {
            $postIdRaw = $request->request->get('id');
            $postId = null;
            if ($postIdRaw !== null && $postIdRaw !== '') {
                // validate integer-ish id
                $filtered = filter_var($postIdRaw, FILTER_VALIDATE_INT);
                $postId = $filtered === false ? null : (int) $filtered;
            }
            $email = (string) $request->request->get('email', '');
            $name = (string) $request->request->get('name', '');
            $password = (string) $request->request->get('password', '');
            $role = (string) $request->request->get('role', User::ROLE_CLIENT);
            $phone = (string) $request->request->get('phone', '');
            $address = (string) $request->request->get('address', '');

            if (empty($email) || empty($name)) {
                $this->addFlash('error', 'Email and name are required');
                return $this->redirectToRoute('admin_users_manage', $postId ? ['id' => $postId] : []);
            }

            try {
                $em = $doctrine->getManager();

                if ($postId) {
                    $user = $doctrine->getRepository(User::class)->find($postId);
                    if (!$user) {
                        $this->addFlash('error', 'User not found');
                        return $this->redirectToRoute('admin_users_list');
                    }
                    // update existing
                    $user->setEmail($email);
                    $user->setName($name);
                    $user->setPhone($phone);
                    $user->setAddress($address);
                    $user->setRoles([$role]);

                    if (!empty($password)) {
                        $hashed = $passwordHasher->hashPassword($user, $password);
                        $user->setPassword($hashed);
                    }

                    $em->persist($user);
                    $em->flush();

                    $this->addFlash('success', 'User updated');
                    return $this->redirectToRoute('admin_users_list');
                }

                // create new
                $user = new User($email, $name);
                if (!empty($password)) {
                    $hashed = $passwordHasher->hashPassword($user, $password);
                    $user->setPassword($hashed);
                }
                if (!empty($phone)) {
                    $user->setPhone($phone);
                }
                if (!empty($address)) {
                    $user->setAddress($address);
                }
                $user->setRoles([$role]);
                $user->setCreatedAt(new \DateTimeImmutable());

                $em->persist($user);
                $em->flush();

                $this->addFlash('success', 'User created');
                return $this->redirectToRoute('admin_users_list');
            } catch (\Throwable $e) {
                $this->addFlash('error', 'Unable to save user: ' . $e->getMessage());
                return $this->redirectToRoute('admin_users_manage', $postId ? ['id' => $postId] : []);
            }
        }

        return $this->render('admin/users/manage.html.twig', ['user' => $userToEdit]);
    }
}
