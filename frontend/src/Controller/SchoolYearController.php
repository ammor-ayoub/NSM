<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class SchoolYearController extends AbstractController
{
    #[Route('/school/year', name: 'app_school_year')]
    public function index(): Response
    {
        return $this->render('school_year/index.html.twig', [
            'controller_name' => 'SchoolYearController',
        ]);
    }

    #[Route('/school/year/create', name: 'app_create_school_year')]
    public function create(): Response
    {
        return $this->render('school_year/create.html.twig', [
            'controller_name' => 'SchoolYearController',
        ]);
    }
}
