<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class DefaultController
{
    public function index(): Response
    {
        return new Response('<html><body><h1>Smart Coffee Menu</h1><p>Welcome — basic Symfony scaffold.</p></body></html>');
    }
}
