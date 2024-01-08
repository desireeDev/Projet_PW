<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class MailEduController extends AbstractController
{
    #[Route('/mail/edu', name: 'app_mail_edu')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/MailEduController.php',
        ]);
    }
    #[Route('/liste-mails-edu', name: 'liste_mails_edu')]
    public function listeMailsEdu(MailEduRepository $mailEduRepository): Response
    {
        // Récupérez la liste des mails envoyés aux autres éducateurs
        $mailsEdu = $mailEduRepository->findAll();

        return $this->render('mail_edu/liste_mails_edu.html.twig', [
            'mailsEdu' => $mailsEdu,
        ]);
    }

    #[Route('/supprimer-mail-edu/{id}', name: 'supprimer_mail_edu')]
    public function supprimerMailEdu(MailEdu $mailEdu): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($mailEdu);
        $entityManager->flush();

        return $this->redirectToRoute('liste_mails_edu');









}

#[Route('/ecrire-mail-edu', name: 'ecrire_mail_edu')]
    public function ecrireMailEdu(Request $request): Response
    {
        $mailEdu = new MailEdu();
        $form = $this->createForm(MailEduType::class, $mailEdu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Récupérez l'éducateur actuellement connecté
            $educateur = $this->getUser();

            // Définissez l'éducateur comme expéditeur du mail
            $mailEdu->setEducateurExpediteur($educateur);

            // Enregistrez le mail dans la base de données
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($mailEdu);
            $entityManager->flush();

            // Redirigez l'utilisateur vers une page de confirmation
            return $this->redirectToRoute('confirmation_mail_envoye');
        }

        return $this->render('mail_edu/ecrire_mail_edu.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/confirmation-mail-envoye', name: 'confirmation_mail_envoye')]
    public function confirmationMailEnvoye(): Response
    {
        return $this->render('mail_edu/confirmation_mail_envoye.html.twig');
    }
}
