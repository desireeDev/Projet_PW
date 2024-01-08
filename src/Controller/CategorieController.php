<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Categorie;


class CategorieController extends AbstractController
{
    #[Route('/categorie', name: 'app_categorie')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/CategorieController.php',
        ]);
    }
    #[Route('/liste-categories', name: 'liste_categories')]
    public function listeCategorie(): JsonResponse
    {
        // Récupérez la liste des catégories
        //$categories = $this->getDoctrine()->getRepository(Categorie::class)->findAll();

        return $this->render('categories/liste_categories.html.twig', [
            'categories' => [],
        ]);
    }
}
