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

    public function create( $Email_Educateur,$Mdp_Educateur,$Administrateur, $id_licencie,$id) {
            $nouveauEducateur = new Educateur($Email_Educateur,$Mdp_Educateur,$Administrateur,$id_licencie,$id);
         
            // Appeler la méthode du modèle (EducateurDAO) pour ajouter l'educateur
            if ($this->EducateursDAO->createEducateur($nouveauEducateur)) {
        
                // Rediriger vers la page d'accueil après l'ajout
                header('Location:../views/educateur/home.php');
                exit();
            } 
            else {
                // Gérer les erreurs d'ajout de l'educateur
                echo "Erreur lors de l'ajout de l'educateur.";     

            } 
         }

         public function update($email, $pwd, $admin,$id_licencie,$idt) {
            $educateur = new Educateur($email, $pwd, $admin, $id_licencie, $idt);
          
            $this->EducateursDAO->Update($educateur); 
            header('Location:../views/educateur/home.php');
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
        header('Location:../views/educateur/home.php');
  
}

}
//Code php pour les differentes pages
$action =  isset($_REQUEST['action']) ? $_REQUEST['action'] : "" ;

switch($action){
    case "Ajouter":
        $idt =  isset($_POST['idt']) ? $_POST['idt'] : '' ;
        $email =  isset($_POST['email']) ? $_POST['email'] : '' ;
        $pwd =  isset($_POST['password']) ? $_POST['password'] : '' ;
        $admin =  isset($_POST['admin']) ? $_POST['admin'] : '' ;
        $id_licencie =  isset($_POST['id_licencie']) ? $_POST['id_licencie'] : '' ;
        if(!empty($email) && !empty($pwd) && !empty($admin) && !empty($id_licencie)&& !empty($idt)){
            $controller = new EducateurController(new Connexion()) ;
            $controller->create($email,$pwd,$admin,$id_licencie,$idt);
        }
        else{
            echo "null";
        }
        break;
    case "Modifier":
        $idt =  isset($_POST['idt']) ? $_POST['idt'] : '' ;
        $email =  isset($_POST['email']) ? $_POST['email'] : '' ;
        $pwd =  isset($_POST['password']) ? $_POST['password'] : '' ;
        $admin =  isset($_POST['admin']) ? $_POST['admin'] : '' ;
        $id_licencie =  isset($_POST['id_licencie']) ? $_POST['id_licencie'] : '' ;
        if(!empty($email) && !empty($pwd) && !empty($admin) && !empty($id_licencie)&& !empty($idt)){
            $controller = new EducateurController(new Connexion()) ;
            $controller->update($email,$pwd,$admin,$id_licencie,$idt);
        }
        else{
            echo "null";
        }
        break;

        case "Supprimer":
            $idt =  isset($_POST['idt']) ? $_POST['idt'] : '' ;
            $email =  isset($_POST['email']) ? $_POST['email'] : '' ;
            $pwd =  isset($_POST['password']) ? $_POST['password'] : '' ;
            $admin =  isset($_POST['admin']) ? $_POST['admin'] : '' ;
            $id_licencie =  isset($_POST['id_licencie']) ? $_POST['id_licencie'] : '' ;
            if(!empty($email) && !empty($pwd) && !empty($admin) && !empty($id_licencie)&& !empty($idt)){
                $controller = new EducateurController(new Connexion()) ;
                $controller->delete($email,$pwd,$admin,$id_licencie,$idt);
            }
            else{
                echo "null";
            }
            break;
}


?>
