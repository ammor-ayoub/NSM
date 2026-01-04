<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/students', name: 'app_students_')]
final class StudentsController extends AbstractController
{
    #[Route('', name: 'list')]
    public function index(): Response
    {
        return $this->render('students/index.html.twig', [
            'controller_name' => 'StudentsController',
        ]);
    }

    #[Route('/student', name: 'create')]
    public function create(): Response
    {
        return $this->render('students/index.html.twig', [
            'controller_name' => 'StudentsController',
        ]);
    }

    #[Route('/student/{id}', name: 'edit')]
    public function edit(int $id): Response
    {
        return $this->render('students/index.html.twig', [
            'controller_name' => 'StudentsController',
        ]);
    }

    #[Route('/student/{id}', name: 'show')]
    public function show(int $id): Response
    {
        return $this->render('students/index.html.twig', [
            'controller_name' => 'StudentsController',
        ]);
    }

    #[Route('/student/{id}', name: 'delete')]
    public function delete(int $id): Response
    {
        return $this->render('students/index.html.twig', [
            'controller_name' => 'StudentsController',
        ]);
    }
}
