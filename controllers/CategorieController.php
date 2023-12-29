<?php

require_once("../config/config.php");
require_once("../classes/models/Connexion.php");
require_once("../classes/models/Categories.php");
require_once("../classes/dao/CategoriesDAO.php");

class CategorieController {

    private $categorieDAO;

    public function __construct(Connexion $connexion) {
        $this->CategoriesDAO = new CategoriesDAO($connexion);
    }

    public function index() {
        // Liste toutes les catégories
        $categories = $this->CategoriesDAO->getAll();
        include '../views/categories/index.php';
    }

    public function create($Code_Raccourci,$Nom_Cat) {

            // Créer un nouvel objet CategorieModel avec les données du formulaire
            $nouvelleCategorie = new Categories($Code_Raccourci, $Nom_Cat);

            // Appeler la méthode du modèle (CategorieDAO) pour ajouter la catégorie
            if ($this->CategoriesDAO->create($nouvelleCategorie)) {
                // Rediriger vers la page d'accueil après l'ajout
                header('Location:HomeController.php');
                exit();
            } else {
                // Gérer les erreurs d'ajout de contact
                echo "Erreur lors de l'ajout du contact.";
            }

        
        // }

        // include '../views/categories/create.php';
    }
//Fonction Store
   

    public function edit($Code_Raccourci) {
        // Affiche le formulaire d'édition pour une catégorie spécifique
        $categorie = $this->CategoriesDAO->getByCode($Code_Raccourci);
        include 'views/categorie/edit.php';
    }

    public function Update($code, $libelle) {
        $categorie = new Categories($code,$libelle);
        // $categorie->setCodeRaccourci($code);
        // $categorie->setCat($code);
        $this->CategoriesDAO->update($categorie); 
        header('Location:HomeController.php');
    }
    
    public function list() {
        // Récupérez la liste des catégories depuis le CategorieDAO
        $categories = $this->CategoriesDAO->getAll();
    
        // Passez la liste des catégories à la vue
        include 'views/categories/index.php';
    }
    


    public function delete($Code_Raccourci) {
        // Supprime une catégorie
        $this->CategoriesDAO->deleteByCode($Code_Raccourci);

        // Redirige vers la liste des catégories
        header('Location: index.php?action=index');
    }


    
    // Autres méthodes liées à la gestion des catégories
    // ...
}
//Code php pour les differentes pages
$action =  isset($_REQUEST['action']) ? $_REQUEST['action'] : "" ;

switch($action){
    case "Ajouter":
        $libelle =  isset($_POST['libelle']) ? $_POST['libelle'] : '' ;
        $code =  isset($_POST['code']) ? $_POST['code'] : '' ;
        if(!empty($libelle) and !empty($code)){
            $controller = new CategorieController(new Connexion()) ;
            $controller->create($code,$libelle);
        }
        break;
    case "Modifier":
        $libelle =  isset($_POST['libelle']) ? $_POST['libelle'] : '' ;
        $code =  isset($_POST['code']) ? $_POST['code'] : '' ;
        if(!empty($libelle) and !empty($code)){
            $controller = new CategorieController(new Connexion()) ;
            $controller->Update($code,$libelle);
        }
        break;

        case "Supprimer":
            $libelle =  isset($_POST['libelle']) ? $_POST['libelle'] : '' ;
            $code =  isset($_POST['code']) ? $_POST['code'] : '' ;

            if(!empty($libelle) and !empty($code)){
                $controller = new CategorieController(new Connexion()) ;

                $controller->delete($code,$libelle);
            }
            break;
}


?>
