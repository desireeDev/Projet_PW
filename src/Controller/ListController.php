<?php

namespace App\Controller;

use App\Entity\Categories;
use App\Repository\CategorieRepository;
use App\Repository\ContactRepository;
use App\Repository\LicenciesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class ListController extends AbstractController
{

    private CategorieRepository $categorieRepository;
    private LicenciesRepository $licencieRepository;
    private ContactRepository $contactRepository;

    public function __construct(CategorieRepository $categorieRepository, LicenciesRepository $licencieRepository, ContactRepository $contactRepository)
    {
        $this->categorieRepository = $categorieRepository;
        $this->licencieRepository = $licencieRepository;
        $this->contactRepository = $contactRepository;
    }

    #[Route(path: '/list', name: 'app_list')]
    public function ListerParCategory(Request $request): Response
    {
        $categories = $this->categorieRepository->findAll();
        $form = $this->createFormBuilder()
            ->add('liste', ChoiceType::class, [
                'choices' => [
                    'Licencies' => 'licencie',
                    'Contact' => 'contact',
                ],
                'multiple' => false,
                'expanded' => false,
            ]) ->add('categories', ChoiceType::class, [
                'choices' => $categories,
                'choice_label' => 'Nom_Cat',
                'choice_value' => 'id',
                'multiple' => false,
                'expanded' => false,
            ]) ->getForm();
        

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            // var_dump($data);
            // die();
            $list = $data['liste'];
            $categories = $data['categories'];
            if($list == 'contact') {
                $contacts = $this->contactRepository->getContactsByCategory($categorie->getId());
                return $this->render('list/contact.html.twig', ["contacts" => $contacts, "categories" => $categories]);
            } else {
                $licencie = $this->licencieRepository->findBy(["id_cat" => $categories->getId()]);
              
                return $this->render('list/licencie.html.twig', ["licencies" => $licencie, "categories" => $categories]);
            }
        }

        return $this->render('list/list.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route(path: '/list/licencie', name: 'app_list_licencie')]
    public function licencie(Request $request): Response {
        $licencie = $request->query->get('licencie');
        $categorie = $request->query->get('licencie');
        return $this->render('list/licencie.html.twig',
            [
                'licencies' => $licencie,
                "categories" => $categorie,
            ]
        );
    }
}

