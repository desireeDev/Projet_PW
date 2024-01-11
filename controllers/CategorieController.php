<?php

require_once("../config/config.php");
require_once("../classes/models/Connexion.php");
require_once("../classes/models/Categories.php");
require_once("../classes/dao/CategoriesDAO.php");

class CategorieController {

    private $CategoriesDAO;

    public function __construct(Connexion $connexion) {
        $this->CategoriesDAO = new CategoriesDAO($connexion);
    }

    public function index() {
        // Liste toutes les catégories
        $categories = $this->CategoriesDAO->getAll();
        include '../views/categories/home.php';
    }

    public function create($Code_Raccourci,$Nom_Cat,$id,) {

            // Créer un nouvel objet CategorieModel avec les données du formulaire
            $nouvelleCategorie = new Categories($Code_Raccourci, $Nom_Cat,$id,);

            // Appeler la méthode du modèle (CategorieDAO) pour ajouter la catégorie
            if ($this->CategoriesDAO->create($nouvelleCategorie)) {
                // Rediriger vers la page d'accueil après l'ajout
                header('Location:../views/categories/home.php');
                exit();
            } else {
                // Gérer les erreurs d'ajout de contact
                echo "Erreur lors de l'ajout du contact.";
            }

        
        // }

        // include '../views/categories/create.php';
    }

   

    public function edit($id) {
        // Affiche le formulaire d'édition pour une catégorie spécifique
        $categorie = $this->CategoriesDAO->getByCode($id);
        include 'views/categorie/edit.php';
    }

    public function Update($code, $libelle ,$idt, $lastCode) {
        $categorie = new Categories($code,$libelle,$idt);
        // $categorie->setCodeRaccourci($code);
        // $categorie->setCat($code);
        $this->CategoriesDAO->update($categorie,$lastCode); 
        header('Location:../views/categories/home.php');
    }
    
    public function list() {
        // Récupérez la liste des catégories depuis le CategorieDAO
        $categories = $this->CategoriesDAO->getAll();
    
        // Passez la liste des catégories à la vue
        include 'views/categories/index.php';
    }
    


    public function delete($id) {
        // Supprime une catégorie
        $this->CategoriesDAO->deleteByCode($id);

        // Redirige vers la liste des catégories
        header('Location:../views/categories/home.php');
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
        $idt =  isset($_POST['idt']) ? $_POST['idt'] : '' ;

        if(!empty($libelle) and !empty($code)and !empty($idt)){
            $controller = new CategorieController(new Connexion()) ;
            $controller->create($code,$libelle,$idt);
        }
        
        break;
    case "Modifier":
        $libelle =  isset($_POST['libelle']) ? $_POST['libelle'] : '' ;
        $code =  isset($_POST['code']) ? $_POST['code'] : '' ;
        $idt =  isset($_POST['idt']) ? $_POST['idt'] : '' ;

        $lastCode =  isset($_POST['lastCode']) ? $_POST['lastCode'] : '' ;
        if(!empty($libelle) and !empty($code) and !empty($lastCode)and !empty($idt)){
            $controller = new CategorieController(new Connexion()) ;
            $controller->Update($code,$libelle,$lastCode,$idt);
        }
        break;

        case "Supprimer":
            $libelle =  isset($_POST['libelle']) ? $_POST['libelle'] : '' ;
            $code =  isset($_POST['code']) ? $_POST['code'] : '' ;
            $idt =  isset($_POST['idt']) ? $_POST['idt'] : '' ;
            if(!empty($libelle) and !empty($code)and !empty($idt)){
                $controller = new CategorieController(new Connexion()) ;

                $controller->delete($code,$libelle,$idt);
            }
            break;
}


?>
