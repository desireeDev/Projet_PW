<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EducateurController extends AbstractController
{
    #[Route('/educateur', name: 'app_educateur')]
    public function index(): Response
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/EducateurController.php',
        ]);
    }
    


    #[Route('/liste-educateurs', name: 'liste_educateurs')]
    public function listeEducateurs(): Response
    {

        return $this->render('educateur/home.html.twig', [
            'educateurs' => [],
        ]);
    }


    #[Route('/create-educateurs', name: 'add_educateurs')]
    public function addEducateurs(): Response
    {
        return $this->render('educateur/create.html.twig', [
            'educateurs' => [],
        ]);
    }


    #[Route('/delete-educateurs', name: 'delete_educateurs')]
    public function deleteEducateurs(): Response
    {
        return $this->render('educateur/delete.html.twig', [
            'educateurs' => [],
        ]);
    }

    #[Route('/update-educateurs', name: 'update_educateurs')]
    public function updateEducateurs(): Response
    {
        return $this->render('educateur/update.html.twig', [
            'educateurs' => [],
        ]);
    }
}
