<?php

require_once("../config/config.php");
require_once("../classes/models/Connexion.php");
require_once("../classes/models/Categories.php");
require_once("../classes/dao/CategoriesDAO.php");

class CategorieController {

    private $categorieDAO;

    public function __construct() {
        $this->CategoriesDAO = new CategorieDAO();
    }

    public function index() {
        // Liste toutes les catégories
        $categories = $this->CategoriesDAO->getAll();
        include '../views/categories/index.php';
    }

    public function create() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire by SAD
            $Code_Raccourci = $_POST['Code_Raccourci'];
            $Nom_Cat = $_POST['Nom_Cat'];

            // Créer un nouvel objet CategorieModel avec les données du formulaire
            $nouvelleCategorie = new CategorieModel(0, $Code_Raccourci, $Nom_Cat);

            // Appeler la méthode du modèle (CategorieDAO) pour ajouter la catégorie
            if ($this->CategoriesDAO->create($nouvelleCategorie)) {
                // Rediriger vers la page d'accueil après l'ajout
                header('Location:HomeController.php');
                exit();
            } else {
                // Gérer les erreurs d'ajout de contact
                echo "Erreur lors de l'ajout du contact.";
            }

        
        }

        include '../views/categories/create.php';
    }
//Fonction Store
    public function store($data) {
        $nom = $data['Nom_Cat'];
        $codeRaccourci = $data['Code_Raccourci'];

    // Crée une nouvelle instance de la classe Categorie
    $nouvelleCategorie = new Categorie($nom, $codeRaccourci);

    // Utilise le CategorieDAO pour enregistrer la nouvelle catégorie dans la base de données
    $resultatCreation = $this->CategoriesDAO->create($nouvelleCategorie);

    // Vérifie le résultat de la création
    if ($resultatCreation) {
        // Redirige vers la liste des catégories en cas de succès
        header('Location: index.php?action=index');
    } else {
        // Gère l'erreur, par exemple en affichant un message à l'utilisateur
        echo "Une erreur s'est produite lors de la création de la catégorie.";
    }
    }

    public function edit($Code_Raccourci) {
        // Affiche le formulaire d'édition pour une catégorie spécifique
        $categorie = $this->CategoriesDAO->getByCode($Code_Raccourci);
        include 'views/categorie/edit.php';
    }

    public function update($id, $data) {
        // Met à jour une catégorie avec les données du formulaire
        $categorie = new Categorie($data['Nom_Cat'], $data['Code_Raccourci']);
        $categorie->setCodeRaccourci($setCodeRaccourci);
        $this->CategoriesDAO->update($categorie);

        // Redirige vers la liste des catégories
        header('Location: index.php?action=index');
    }

    public function delete($Code_Raccourci) {
        // Supprime une catégorie
        $this->categorieDAO->deleteByCode($Code_Raccourci);

        // Redirige vers la liste des catégories
        header('Location: index.php?action=index');
    }

    // Autres méthodes liées à la gestion des catégories
    // ...
}

?>
