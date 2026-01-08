<?php

namespace App\Security;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;

class LoginSuccessHandler implements AuthenticationSuccessHandlerInterface
{
    public function onAuthenticationSuccess(Request $request, TokenInterface $token): Response
    {
        $roles = $token->getRoleNames();

        // priority: admin -> traiteur -> client
        if (in_array('ROLE_ADMIN', $roles, true)) {
            return new RedirectResponse('/admin');
        }

        if (in_array('ROLE_TRAITEUR', $roles, true)) {
            return new RedirectResponse('/traiteur');
        }

        // default for regular users (clients)
        return new RedirectResponse('/cafe_virtuel');
    }
}
