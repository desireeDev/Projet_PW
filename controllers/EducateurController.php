<?php

require_once("../config/config.php");
require_once("../classes/models/Connexion.php");
require_once("../classes/models/Educateur.php");
require_once("../classes/dao/EducateurDAO.php");

class EducateurController {

    private $educateurDAO;

    public function __construct() {
        $this->EducateursDAO = new EducateursDAO();
    }

    public function index() {
        // Liste toutes les educateurs
        $educateur = $this->EducateursDAO->getAll();
        include '../views/educateur/home.php';
    }

    public function create($Email_Educateur,$Mdp_Educateur,$Administrateur,  $Num_Licencie) {

            // Créer un nouvel objet EducateurModel avec les données du formulaire
            $nouveauEducateur = new Educateur($Email_Educateur,$Mdp_Educateur,$Administrateur,  $Num_Licencie);

            // Appeler la méthode du modèle (EducateurDAO) pour ajouter l'educateur
            if ($this->EducateursDAO->createEducateur($nouveauEducateur)) {
                // Rediriger vers la page d'accueil après l'ajout
                header('Location:HomeController.php');
                exit();
            } else {
                // Gérer les erreurs d'ajout de l'educateur
                echo "Erreur lors de l'ajout de l'educateur.";
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
