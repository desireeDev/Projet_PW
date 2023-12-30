<?php

require_once("../config/config.php");
require_once("../classes/models/Connexion.php");
require_once("../classes/models/Educateur.php");
require_once("../classes/dao/EducateurDAO.php");

class EducateurController {

    private $educateurDAO;

    public function __construct(Connexion $connexion) {
        $this->EducateursDAO = new EducateurDAO($connexion);
    }

    public function index() {
        // Liste toutes les educateurs
        $educateurs = $this->EducateursDAO->getAll();
    
        include '../views/educateur/index.php';
    }

    public function create($Email_Educateur,$Mdp_Educateur, $Administrateur,$Num_Licencie) {

            // Créer un nouvel objet CategorieModel avec les données du formulaire
            $nouvelEducateur = new Educateur($Email_Educateur, $Mdp_Educateur,$Administrateur,$Num_Licencie);

            // Appeler la méthode du modèle (CategorieDAO) pour ajouter la catégorie
            if ($this->EducateursDAO->createEducateur($nouvelEducateur)) {
                // Rediriger vers la page d'accueil après l'ajout
                header('Location:HomeController.php');
                exit();
            } else {
                // Gérer les erreurs d'ajout de contact
                echo "Erreur lors de l'ajout du contact.";
            }

        
  

    }

   

    public function edit($Email_Educateur) {
        // Affiche le formulaire d'édition pour une catégorie spécifique
        $educateur = $this->EducateursDAO->getByCode($Email_Educateur);
        include 'views/educateur/edit.php';
    }

    public function Update($email, $password, $admin, $numLicencie) {
        $educateur = new Educateur($email, $password, $admin, $numLicencie);
    
        $this->EducateursDAO->updateEducateur($educateur); 
        header('Location:HomeController.php');
    }
    
    public function list() {
        // Récupérez la liste des educateurs depuis le CategorieDAO
        $educateur = $this->EducateursDAO->getAll();
    
        // Passez la liste des educateurs à la vue
        include 'views/educateur/home.php';
    }
    


    public function delete($Email_Educateur ) {
        // Supprime un licenciz
        $this->EducateursDAO->deleteEducateur($Email_Educateur);

        // Redirige vers la liste des licencies
        header('Location: index.php?action=index');
    }


    
    // Autres méthodes liées à la gestion des catégories
    // ...
}
//Code php pour les differentes pages
$action =  isset($_REQUEST['action']) ? $_REQUEST['action'] : "" ;

switch($action){
    case "Ajouter":
        $email =  isset($_POST['email']) ? $_POST['email'] : '' ;
        $password =  isset($_POST['password']) ? $_POST['password'] : '' ;
        $admin =  isset($_POST['admin']) ? $_POST['admin'] : '' ;
        $numLicencie =  isset($_POST['numLicencie']) ? $_POST['numLicencie'] : '' ;
        if(!empty($email) and !empty($password) and !empty($admin) and !empty($numLicencie)){
            $controller = new EducateurController(new Connexion()) ;
            $controller->create($email,$password,$admin,$numLicencie);
        }
        break;
    case "Modifier":
        $email =  isset($_POST['email']) ? $_POST['email'] : '' ;
        $password =  isset($_POST['password']) ? $_POST['password'] : '' ;
        $admin =  isset($_POST['admin']) ? $_POST['admin'] : '' ;
        $numLicencie =  isset($_POST['numLicencie']) ? $_POST['numLicencie'] : '' ;
        if(!empty($email) and !empty($password) and !empty($admin) and !empty($numLicencie)){
            $controller = new EducateurController(new Connexion()) ;
            $controller->Update($email,$password,$admin,$numLicencie);
        }
        break;

        case "Supprimer":
            $email =  isset($_POST['email']) ? $_POST['email'] : '' ;
            $password =  isset($_POST['password']) ? $_POST['password'] : '' ;
            $admin =  isset($_POST['admin']) ? $_POST['admin'] : '' ;
            $numLicencie =  isset($_POST['numLicencie']) ? $_POST['numLicencie'] : '' ;
            if(!empty($email) and !empty($password) and !empty($admin) and !empty($numLicencie)){
                $controller = new EducateurController(new Connexion()) ;
                $controller->delete($email,$password,$admin,$numLicencie);
            }
            break;
}


?>
