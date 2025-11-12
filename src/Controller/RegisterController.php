<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;

class RegisterController extends AbstractController
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private UserPasswordHasherInterface $passwordHasher
    ) {}

    #[Route('/register', name: 'app_register')]
    public function register(Request $request): Response
    {
        if ($request->isMethod('POST')) {
            $email = $request->request->get('email');
            $firstName = $request->request->get('firstName');
            $lastName = $request->request->get('lastName');
            $phone = $request->request->get('phone');
            $password = $request->request->get('password');
            $confirmPassword = $request->request->get('confirmPassword');

            // Validation
            $errors = [];

            if (empty($email)) {
                $errors[] = 'L\'email est requis';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'Email invalide';
            }

            if (empty($firstName)) {
                $errors[] = 'Le prénom est requis';
            }

            if (empty($lastName)) {
                $errors[] = 'Le nom est requis';
            }

            if (empty($password)) {
                $errors[] = 'Le mot de passe est requis';
            } elseif (strlen($password) < 6) {
                $errors[] = 'Le mot de passe doit contenir au moins 6 caractères';
            }

            if ($password !== $confirmPassword) {
                $errors[] = 'Les mots de passe ne correspondent pas';
            }

            // Check if email already exists
            $existingUser = $this->entityManager->getRepository(User::class)->findOneBy(['email' => $email]);
            if ($existingUser) {
                $errors[] = 'Cet email est déjà utilisé';
            }

            if (!empty($errors)) {
                return $this->render('auth/register.html.twig', [
                    'errors' => $errors,
                    'formData' => [
                        'email' => $email,
                        'firstName' => $firstName,
                        'lastName' => $lastName,
                        'phone' => $phone
                    ]
                ]);
            }

            // Create new user
            $user = new User();
            $user->setEmail($email);
            $user->setFirstName($firstName);
            $user->setLastName($lastName);
            $user->setPhone($phone);
            $user->setRoles(['ROLE_USER']);
            
            // Hash password
            $hashedPassword = $this->passwordHasher->hashPassword($user, $password);
            $user->setPassword($hashedPassword);

            $this->entityManager->persist($user);
            $this->entityManager->flush();

            return $this->redirectToRoute('app_login', [
                'success' => 'Inscription réussie! Veuillez vous connecter.'
            ]);
        }

        return $this->render('auth/register.html.twig');
    }
}
