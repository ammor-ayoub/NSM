<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class LevelsController extends AbstractController
{
    #[Route('/levels', name: 'app_levels')]
    public function index(): Response
    {
        return $this->render('levels/index.html.twig', [
            'controller_name' => 'LevelsController',
        ]);
    }
    #[Route('/levels/create', name: 'app_create_levels')]
    public function create(): Response
    {
        return $this->render('levels/create.html.twig', [
            'controller_name' => 'LevelsController',
        ]);
    }
}
