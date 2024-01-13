<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
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
    public function listeLicencies(LicenciesRepository $licencieRepository, int $categorieId): Response
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

    #[Route('/liste-licencies', name: 'liste_licencies_all')]
    public function listeLicenciesAll(): Response
    {
        // Récupérez la liste des licenciés
        return $this->render('licencies/home.html.twig', [
            'licencies' => [],
        ]);
    }



    #[Route('/create-licencies', name: 'add_licencies')]
    public function addLicencies(): Response
    {
        return $this->render('licencies/create.html.twig', [
            'licencies' => [],
        ]);
    }



    #[Route('/delete-licencies', name: 'delete_licencies')]
    public function deleteLicencies(): Response
    {
        return $this->render('licencies/delete.html.twig', [
            'licencies' => [],
        ]);
    }



    #[Route('/update-licencies', name: 'update_licencies')]
    public function updateLicencies(): Response
    {
        return $this->render('licencies/update.html.twig', [
            'licencies' => [],
        ]);
    }




}


