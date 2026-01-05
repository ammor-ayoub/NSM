<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class FeesController extends AbstractController
{
    #[Route('/frais', name: 'app_fees')]
    public function index(): Response
    {
        return $this->render('frais/index.html.twig', [
            'controller_name' => 'FeesController',
        ]);
    }
}
