<?php

require_once("../config/config.php");
require_once("../classes/models/Connexion.php");
require_once("../classes/models/Educateur.php");
require_once("../classes/dao/EducateurDAO.php");
class EducateurController {
    private $educateurDAO;

    public function __construct(Connexion $connexion) {
        $this->EducateursDAO = new EducateursDAO($connexion);
    } 
    
    public function index() {
        // Liste toutes les educateurs
        $educateur = $this->EducateursDAO->getAll();
        include '../views/educateur/home.php';
    }

    public function create($Email_Educateur,$Mdp_Educateur,$Administrateur,  $Num_Licencie) {

            // Créer un nouvel objet EducateurModel avec les données du formulair
            $nouvelEducateur = new Educateur($Email_Educateur, $Mdp_Educateur,$Administrateur,$Num_Licencie);

            // Appeler la méthode du modèle (EducateurDAO) pour ajouter le nouvel educateur à la base de données
            if ($this->EducateursDAO->createEducateur($nouvelEducateur)) 
            $nouveauEducateur = new Educateur($Email_Educateur,$Mdp_Educateur,$Administrateur,  $Num_Licencie);

            // Appeler la méthode du modèle (EducateurDAO) pour ajouter l'educateur
            if ($this->EducateursDAO->createEducateur($nouveauEducateur)) {
                // Rediriger vers la page d'accueil après l'ajout
                header('Location:HomeController.php');
                exit();
            } 
            else {
                // Gérer les erreurs d'ajout de l'educateur
                echo "Erreur lors de l'ajout de l'educateur.";     

            } 
         }

         public function update($email, $pwd, $admin,$numLicencie) {
            $educateur = new Educateur( $email, $pwd, $admin, $numLicencie);
          
            $this->EducateursDAO->Update($educateur); 
            header('Location:HomeController.php');
        }
        
        public function list() {
            // Récupérez la liste des educateurs depuis l'EducateurDAO
            $educateur = $this->EducateursDAO->getAll();
        
            // Passez la liste des catégories à la vue
            include 'views/educateur/index.php';
        }
    public function delete($Email_Educateur ) {
        // Supprime un educateur spécifique en fonction de son ID
        $this->EducateursDAO->Delete($Email_Educateur); 
  
}

}
//Code php pour les differentes pages
$action =  isset($_REQUEST['action']) ? $_REQUEST['action'] : "" ;

switch($action){
    case "Ajouter":

        $email =  isset($_POST['email']) ? $_POST['email'] : '' ;
        $pwd =  isset($_POST['password']) ? $_POST['password'] : '' ;
        $admin =  isset($_POST['admin']) ? $_POST['admin'] : '' ;
        $numLicencie =  isset($_POST['numLicencie']) ? $_POST['numLicencie'] : '' ;
        if(!empty($email) && !empty($pwd) && !empty($admin) && !empty($numLicencie)){
            $controller = new EducateurController(new Connexion()) ;
            $controller->create($email,$pwd,$admin,$numLicencie);
        }
        else{
            echo "null";
        }
        break;
    case "Modifier":
        $email =  isset($_POST['email']) ? $_POST['email'] : '' ;
        $pwd =  isset($_POST['password']) ? $_POST['password'] : '' ;
        $admin =  isset($_POST['admin']) ? $_POST['admin'] : '' ;
        $numLicencie =  isset($_POST['numLicencie']) ? $_POST['numLicencie'] : '' ;
        if(!empty($email) && !empty($pwd) && !empty($admin) && !empty($numLicencie)){
            $controller = new EducateurController(new Connexion()) ;
            $controller->update($email,$pwd,$admin,$numLicencie);
        }
        else{
            echo "null";
        }
        break;

        case "Supprimer":
            $email =  isset($_POST['email']) ? $_POST['email'] : '' ;
            $pwd =  isset($_POST['password']) ? $_POST['password'] : '' ;
            $admin =  isset($_POST['admin']) ? $_POST['admin'] : '' ;
            $numLicencie =  isset($_POST['numLicencie']) ? $_POST['numLicencie'] : '' ;
            if(!empty($email) && !empty($pwd) && !empty($admin) && !empty($numLicencie)){
                $controller = new EducateurController(new Connexion()) ;
                $controller->delete($email,$pwd,$admin,$numLicencie);
            }
            else{
                echo "null";
            }
            break;
}


?>
