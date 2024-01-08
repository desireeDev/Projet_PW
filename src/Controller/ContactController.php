<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/ContactController.php',
        ]);
    }
    #[Route('/liste-contacts/{categorieId}', name: 'liste_contacts')]
    public function listeContacts(ContactRepository $contactRepository, int $categorieId): Response
    {
        // Récupérez la catégorie par son ID
        $categorie = $this->getDoctrine()->getRepository(Categorie::class)->find($categorieId);

        if (!$categorie) {
            throw $this->createNotFoundException('Catégorie non trouvée');
        }

        // Récupérez la liste des contacts pour cette catégorie
        $contacts = $contactRepository->findBy(['categorie' => $categorie]);

        return $this->render('contact/liste_contacts.html.twig', [
            'contacts' => $contacts,
            'categorie' => $categorie,
        ]);
    }


}
