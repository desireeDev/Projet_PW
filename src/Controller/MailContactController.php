<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class MailContactController extends AbstractController
{
    #[Route('/mail/contact', name: 'app_mail_contact')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/MailContactController.php',
        ]);
    }

    #[Route('/liste-mails-contact', name: 'liste_mails_contact')]
    public function listeMailsContact(MailContactRepository $mailContactRepository): Response
    {
        // Récupérez la liste des mails envoyés aux contacts
        $mailsContact = $mailContactRepository->findAll();

        return $this->render('mail_contact/liste_mails_contact.html.twig', [
            'mailsContact' => $mailsContact,
        ]);
    }

    #[Route('/supprimer-mail-contact/{id}', name: 'supprimer_mail_contact')]
    public function supprimerMailContact(MailContact $mailContact): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($mailContact);
        $entityManager->flush();

        return $this->redirectToRoute('liste_mails_contact');
    }

    #[Route('/ecrire-mail-contact', name: 'ecrire_mail_contact')]
    public function ecrireMailContact(Request $request): Response
    {
        $mailContact = new MailContact();
        $form = $this->createForm(MailContactType::class, $mailContact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Récupérez les catégories sélectionnées depuis le formulaire
            $categoriesSelectionnees = $form->get('categoriesSelectionnees')->getData();

            // Récupérez les contacts associés aux catégories sélectionnées
            $contactsDestinataires = $this->getDoctrine()->getRepository(Contact::class)->findContactsByCategories($categoriesSelectionnees);

            // Associez les contacts destinataires au mail
            foreach ($contactsDestinataires as $contact) {
                $mailContact->addContactDestinataire($contact);
            }

            // Enregistrez le mail dans la base de données
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($mailContact);
            $entityManager->flush();

            // Redirigez l'utilisateur vers une page de confirmation
            return $this->redirectToRoute('confirmation_mail_envoye');
        }

        return $this->render('mail_contact/ecrire_mail_contact.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/confirmation-mail-envoye', name: 'confirmation_mail_envoye')]
    public function confirmationMailEnvoye(): Response
    {
        return $this->render('mail_contact/confirmation_mail_envoye.html.twig');
    }


    

}
