<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class LicenceController extends AbstractController
{
    #[Route('/licence', name: 'app_licence')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/LicenceController.php',
        ]);
    }


    #[Route('/liste-licencies/{categorieId}', name: 'liste_licencies')]
    public function listeLicencies(LicencieRepository $licencieRepository, int $categorieId): Response
    {
        // Récupérez la catégorie par son ID
        $categorie = $this->getDoctrine()->getRepository(Categorie::class)->find($categorieId);

        if (!$categorie) {
            throw $this->createNotFoundException('Catégorie non trouvée');
        }

        // Récupérez la liste des licenciés pour cette catégorie
        $licencies = $licencieRepository->findBy(['categorie' => $categorie]);

        return $this->render('votre_template/liste_licencies.html.twig', [
            'licencies' => $licencies,
            'categorie' => $categorie,
        ]);
    }

}


