<?php
namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class EventsController extends AbstractController
{
    #[Route('/admin/events', name: 'admin_events')]
    public function index(): Response
    {
        return $this->render('admin/events/list.html.twig');
    }

    #[Route('/admin/events/list', name: 'admin_events_list')]
    public function list(): Response
    {
        return $this->render('admin/events/list.html.twig');
    }

    #[Route('/admin/events/new', name: 'admin_events_new')]
    public function create(): Response
    {
        return $this->render('admin/events/new.html.twig');
    }

    #[Route('/admin/events/{id}/edit', name: 'admin_events_edit')]
    public function edit(int $id): Response
    {
        return $this->render('admin/events/edit.html.twig', ['id' => $id]);
    }
}
