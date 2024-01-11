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

    public function create($id,$Nom_Contact, $Prenom_Contact, $Email_Contact, $Numero_Contact,$id_licencie) {

            // Créer un nouvel objet ContactModel avec les données du formulaire
            $nouveauContact = new Contact($id,$Nom_Contact, $Prenom_Contact, $Email_Contact, $Numero_Contact,$id_licencie);

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

    public function edit($id) {
        // Affiche le formulaire d'édition pour un contact spécifique
        $contact = $this->ContactDAO->getByCode($id);
        include 'views/contact/edit.php';
    }

    public function Update($idt, $nom, $prenom, $email, $telephone,$numLicencie) {
        $contact = new Contact( $idt, $nom, $prenom, $email, $telephone,$numLicencie);
      
        $this->ContactDAO->update($contact); 
        header('Location:../views/contact/home.php');
    }
    
    public function list() {
        // Récupérez la liste des contact depuis le ContactDAO
        $contact = $this->ContactDAO->getAll();
    
        // Passez la liste des catégories à la vue
        include 'views/contact/index.php';
    }
    


    public function delete($id) {
        // Supprime un contact
        $this->ContactDAO->deleteByCode($id);

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

        $idt =  isset($_POST['id']) ? $_POST['id'] : '' ;
        $nom =  isset($_POST['nom']) ? $_POST['nom'] : '' ;
        $prenom =  isset($_POST['prenom']) ? $_POST['prenom'] : '' ;
        $email =  isset($_POST['email']) ? $_POST['email'] : '' ;
        $telephone =  isset($_POST['telephone']) ? $_POST['telephone'] : '' ;
        $numLicencie =  isset($_POST['numLicencie']) ? $_POST['numLicencie'] : '' ;
        

        if(!empty($idt) && !empty($nom) && !empty($prenom) && !empty($email) && !empty($telephone) && !empty($numLicencie)){
            $controller = new ContactController(new Connexion()) ;
            $controller->create($idt, $nom, $prenom, $email, $telephone,$numLicencie);
        }else{
            echo "null";
        }
        break;
    case "Modifier":
        $idt =  isset($_POST['libelle']) ? $_POST['libelle'] : '' ;
        $nom =  isset($_POST['nom']) ? $_POST['nom'] : '' ;
        $prenom =  isset($_POST['prenom']) ? $_POST['prenom'] : '' ;
        $email =  isset($_POST['email']) ? $_POST['email'] : '' ;
        $telephone =  isset($_POST['telephone']) ? $_POST['telephone'] : '' ;
        $numLicencie =  isset($_POST['numLicencie']) ? $_POST['numLicencie'] : '' ;
        if(!empty($idt) && !empty($nom) && !empty($prenom) && !empty($email) && !empty($telephone) && !empty($numLicencie)){
            $controller = new ContactController(new Connexion()) ;
            $controller->Update($idt, $nom, $prenom, $email, $telephone,$numLicencie);
        }else{
            echo "null";
        }
        break;

        case "Supprimer":
            $idt =  isset($_POST['libelle']) ? $_POST['libelle'] : '' ;
            $nom =  isset($_POST['nom']) ? $_POST['nom'] : '' ;
            $prenom =  isset($_POST['prenom']) ? $_POST['prenom'] : '' ;
            $email =  isset($_POST['email']) ? $_POST['email'] : '' ;
            $telephone =  isset($_POST['telephone']) ? $_POST['telephone'] : '' ;
            $numLicencie =  isset($_POST['numLicencie']) ? $_POST['numLicencie'] : '' ;


            if(!empty($idt) && !empty($nom) && !empty($prenom) && !empty($email) && !empty($telephone) && !empty($numLicencie)){
                $controller = new ContactController(new Connexion()) ;
                $controller->delete($idt, $nom, $prenom, $email, $telephone,$numLicencie);
            }else{
                echo 'null' ;
            }
            break;
}


?>
