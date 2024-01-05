<?php

require_once("../config/config.php");
require_once("../classes/models/Connexion.php");
require_once("../classes/models/Contact.php");
require_once("../classes/dao/ContactDAO.php");

class ContactController {

    private $contactDAO;

    public function __construct(Connexion $connexion) {
        $this->ContactDAO = new ContactDAO($connexion);
    }

    public function index() {
        // Liste toutes les contacts
        $contacts = $this->ContactDAO->getAll();
        include '../views/contact/home.php';
      
    }

    public function create($Code_Contact,$Nom_Contact, $Prenom_Contact, $Email_Contact, $Numero_Contact,$Num_Licencie) {

            // Créer un nouvel objet ContactModel avec les données du formulaire
            $nouveauContact = new Contact($Code_Contact,$Nom_Contact, $Prenom_Contact, $Email_Contact, $Numero_Contact,$Num_Licencie);

            // Appeler la méthode du modèle (ContactDAO) pour ajouter le contact dans la base de données
            if ($this->ContactDAO->create($nouveauContact)) {
                // Rediriger vers la page d'accueil après l'ajout
                header('Location:../views/contact/home.php');
                exit();
            } else {
                // Gérer les erreurs d'ajout de contact
                echo "Erreur lors de l'ajout du contact.";
            }

        
        // }

    }

    public function edit($Code_Contact) {
        // Affiche le formulaire d'édition pour un contact spécifique
        $contact = $this->ContactDAO->getByCode($Code_Contact);
        include 'views/contact/edit.php';
    }

    public function Update($id, $nom, $prenom, $email, $telephone,$numLicencie) {
        $contact = new Contact( $id, $nom, $prenom, $email, $telephone,$numLicencie);
      
        $this->ContactDAO->update($contact); 
        header('Location:../views/contact/home.php');
    }
    
    public function list() {
        // Récupérez la liste des contact depuis le ContactDAO
        $contact = $this->ContactDAO->getAll();
    
        // Passez la liste des catégories à la vue
        include 'views/contact/index.php';
    }
    


    public function delete($Code_Contact) {
        // Supprime un contact
        $this->ContactDAO->deleteByCode($Code_Contact);

        // Redirige vers la liste des catégories
        header('Location:../views/contact/home.php');
    }


    
    // Autres méthodes liées à la gestion des contacts
    // ...
}
//Code php pour les differentes pages
$action =  isset($_REQUEST['action']) ? $_REQUEST['action'] : "" ;

switch($action){
    case "Ajouter":

        $id =  isset($_POST['id']) ? $_POST['id'] : '' ;
        $nom =  isset($_POST['nom']) ? $_POST['nom'] : '' ;
        $prenom =  isset($_POST['prenom']) ? $_POST['prenom'] : '' ;
        $email =  isset($_POST['email']) ? $_POST['email'] : '' ;
        $telephone =  isset($_POST['telephone']) ? $_POST['telephone'] : '' ;
        $numLicencie =  isset($_POST['numLicencie']) ? $_POST['numLicencie'] : '' ;
        

        if(!empty($id) && !empty($nom) && !empty($prenom) && !empty($email) && !empty($telephone) && !empty($numLicencie)){
            $controller = new ContactController(new Connexion()) ;
            $controller->create($id, $nom, $prenom, $email, $telephone,$numLicencie);
        }else{
            echo "null";
        }
        break;
    case "Modifier":
        $id =  isset($_POST['libelle']) ? $_POST['libelle'] : '' ;
        $nom =  isset($_POST['nom']) ? $_POST['nom'] : '' ;
        $prenom =  isset($_POST['prenom']) ? $_POST['prenom'] : '' ;
        $email =  isset($_POST['email']) ? $_POST['email'] : '' ;
        $telephone =  isset($_POST['telephone']) ? $_POST['telephone'] : '' ;
        $numLicencie =  isset($_POST['numLicencie']) ? $_POST['numLicencie'] : '' ;
        if(!empty($id) && !empty($nom) && !empty($prenom) && !empty($email) && !empty($telephone) && !empty($numLicencie)){
            $controller = new ContactController(new Connexion()) ;
            $controller->Update($id, $nom, $prenom, $email, $telephone,$numLicencie);
        }else{
            echo "null";
        }
        break;

        case "Supprimer":
            $id =  isset($_POST['libelle']) ? $_POST['libelle'] : '' ;
            $nom =  isset($_POST['nom']) ? $_POST['nom'] : '' ;
            $prenom =  isset($_POST['prenom']) ? $_POST['prenom'] : '' ;
            $email =  isset($_POST['email']) ? $_POST['email'] : '' ;
            $telephone =  isset($_POST['telephone']) ? $_POST['telephone'] : '' ;
            $numLicencie =  isset($_POST['numLicencie']) ? $_POST['numLicencie'] : '' ;


            if(!empty($id) && !empty($nom) && !empty($prenom) && !empty($email) && !empty($telephone) && !empty($numLicencie)){
                $controller = new ContactController(new Connexion()) ;
                $controller->delete($id, $nom, $prenom, $email, $telephone,$numLicencie);
            }else{
                echo 'null' ;
            }
            break;
}


?>
