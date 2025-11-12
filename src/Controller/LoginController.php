<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;

class LoginController extends AbstractController
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private UserPasswordHasherInterface $passwordHasher
    ) {}

    #[Route('/login', name: 'app_login')]
    public function login(Request $request): Response
    {
        // If user is already logged in via session, redirect
        if ($request->getSession()->get('user_id')) {
            if (in_array('ROLE_ADMIN', $request->getSession()->get('user_roles', []))) {
                return $this->redirectToRoute('admin_dashboard');
            }
            return $this->redirectToRoute('app_cafe_home');
        }

        $error = null;
        $success = $request->query->get('success');

        if ($request->isMethod('POST')) {
            $email = $request->request->get('email');
            $password = $request->request->get('password');

            if (empty($email) || empty($password)) {
                $error = 'Email et mot de passe requis';
            } else {
                // Find user by email
                $user = $this->entityManager->getRepository(User::class)->findOneBy(['email' => $email]);

                if (!$user) {
                    $error = 'Email ou mot de passe incorrect';
                } else {
                    // Verify password
                    if (!$user->isActive()) {
                        $error = 'Compte désactivé';
                    } elseif ($this->passwordHasher->isPasswordValid($user, $password)) {
                        // Login successful - store in session
                        $request->getSession()->set('user_id', $user->getId());
                        $request->getSession()->set('user_email', $user->getEmail());
                        $request->getSession()->set('user_roles', $user->getRoles());
                        $request->getSession()->set('user_name', $user->getFirstName() . ' ' . $user->getLastName());

                        // Redirect based on role
                        if (in_array('ROLE_ADMIN', $user->getRoles())) {
                            return $this->redirectToRoute('admin_dashboard');
                        }

                        return $this->redirectToRoute('app_cafe_home');
                    } else {
                        $error = 'Email ou mot de passe incorrect';
                    }
                }
            }
        }

        return $this->render('auth/login.html.twig', [
            'error' => $error,
            'success' => $success
        ]);
    }

    #[Route('/logout', name: 'app_logout')]
    public function logout(Request $request): Response
    {
        $request->getSession()->clear();
        
        return $this->redirectToRoute('app_home');
    }
}
