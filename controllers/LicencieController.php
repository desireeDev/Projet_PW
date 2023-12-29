<?php

require_once("../config/config.php");
require_once("../classes/models/Connexion.php");
require_once("../classes/models/Licencie.php");
require_once("../classes/dao/LicencieDAO.php");

class LicencieController {

    private $licenciesDAO;

    public function __construct() {
        $this->LicenciesDAO = new LicencieDAO();
    }

    public function index() {
        // Liste toutes les catégories
        $licencies = $this->LicenciesDAO->getAll();
        include '../views/licencies/home.php';
    }

    public function create($Num_Licencie, $Nom_Licencie,$Prenom_Licencie,$Contact_Licencie,$Code_Raccourci ) { // C'est une instance de la classe Contact//

            // Créer un nouvel objet Licencies avec les données du formulaire
            $nouveauLicencie = new Licencie($Num_Licencie, $Nom_Licencie,$Prenom_Licencie,$Contact_Licencie,$Code_Raccourci );

            // Appeler la méthode du modèle (LicenciesDAO) pour ajouter le/la licencie
            if ($this->licenciesDAO->create($nouveauLicencie)) {
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
   

    public function edit($Num_Licencie) {
        // Affiche le formulaire d'édition pour un licencie spécifique
        $licencie  = $this->licenciesDAO->getLicencieById($Num_Licencie);
        include 'views/licencie/edit.php';
    }

    public function Update($Num_Licencie, $Nom_Licencie,$Prenom_Licencie,$Contact_Licencie,$Code_Raccourci) {
        $licencie = new Licencie($Num_Licencie, $Nom_Licencie,$Prenom_Licencie,$Contact_Licencie,$Code_Raccourci);
        // $categorie->setCodeRaccourci($code);
        // $categorie->setCat($code);
        $this->licenciesDAO->updateLicencie($licencie); 
        header('Location:HomeController.php');
    }
    
    public function list() {
        // Récupérez la liste des licencies depuis le LicencieDAO
        $licencies = $this->licenciesDAO->getAllLicencies();
    
        // Passez la liste des licencies à la vue
        include 'views/licencies/home.php';
    }
    

    public function delete($licencieId) {
        // Supprime un licencie
        $this->licenciesDAO->deleteLicencie($licencieId);

        // Redirige vers la liste des licencies
        header('Location: views/licencies/home.php?action=index');
    }

// modifier categorie -> licencies jusqu'au delete
    
    // Autres méthodes liées à la gestion des licecies
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
