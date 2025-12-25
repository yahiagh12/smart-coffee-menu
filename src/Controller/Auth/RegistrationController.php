<?php

namespace App\Controller\Auth;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class RegistrationController extends AbstractController
{
    #[Route(path: '/auth/register', name: 'app_register')]
    public function register(Request $request, EntityManagerInterface $em, UserPasswordHasherInterface $hasher): Response
    {
        // simple register flow: expects POST with email, firstName, lastName, address, phone and password
        if ($request->isMethod('POST')) {
            $email = (string) $request->request->get('email');
            $firstName = (string) $request->request->get('firstName', '');
            $lastName = (string) $request->request->get('lastName', '');
            $name = trim(($firstName . ' ' . $lastName));
            if ($name === '') {
                // fallback to single `name` if provided
                $name = (string) $request->request->get('name', '');
            }

            $address = (string) $request->request->get('address', '');
            $phone = (string) $request->request->get('phone', '');

            $user = new User($email, $name);
            $user->setAddress($address ?: null);
            $user->setPhone($phone ?: null);

            // Always register regular users as clients by default
            $user->setRoles([User::ROLE_CLIENT]);

            // Handle password
            $plain = (string) $request->request->get('password', '');
            if (strlen($plain) > 0) {
                $hashed = $hasher->hashPassword($user, $plain);
                $user->setPassword($hashed);
            }

            // default fidelite is 0; if form provides a value use it
            $fidelite = (int) $request->request->get('fidelite', 0);
            $user->setFidelite($fidelite);

            $em->persist($user);
            $em->flush();

            $this->addFlash('success', 'Votre compte a été créé. Vous pouvez vous connecter.');

            return $this->redirectToRoute('app_login');
        }

        return $this->render('auth/pages/register.html.twig');
    }
}
