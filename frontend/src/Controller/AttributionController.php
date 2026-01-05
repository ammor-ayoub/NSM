<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/attribution', name: 'app_attribution_')]
final class AttributionController extends AbstractController
{
    #[Route('', name: 'list')]
    public function index(): Response
    {
        return $this->render('attribution/index.html.twig', [
            'controller_name' => 'AttributionController',
        ]);
    }

    #[Route('/create', name: 'create')]
    public function create(): Response
    {
        return $this->render('attribution/create.html.twig', [
            'controller_name' => 'AttributionController',
        ]);
    }

    #[Route(path: '/edit', name: 'edit')]
    public function edit(): Response
    {
        return $this->render('attribution/edit.html.twig', [
            'controller_name' => 'AttributionController',
        ]);
    }
}
