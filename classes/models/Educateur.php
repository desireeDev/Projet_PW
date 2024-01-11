<?php
class Educateur {
    // Attributs
    private $Email_Educateur;
    private $Mdp_Educateur;
    private $Administrateur;  
    private $id_licencie;
    private $id;
    // Constructeur
    public function __construct( $Email_Educateur, $Mdp_Educateur, $Administrateur, $id_licencie, $id) {
        $this->Email_Educateur = $Email_Educateur;
        $this->Mdp_Educateur = $Mdp_Educateur;
        $this->Administrateur = $Administrateur;
        $this->id_licencie = $id_licencie;
        $this->id = $id;
     
    }

    // Getters

    public function getId() {
        return $this->id_licencie;
    }
    public function getEdu() {
        return $this->id;
       
    }

    public function getEmail() {
        return $this->Email_Educateur;
    
    }

    public function getMotDePasse() {
        return $this->Mdp_Educateur;
      
    }

    public function isAdmin() {
        return $this->Administrateur;
      
    }

    // Setters


    public function setId($id) {
        $this->id = $id;
    
    }   

    public function setNumeroLicence($id_licencie) {
        $this->id_licencie = $id_licencie;

    
    }

    public function setEmail($Email_Educateur) {

        $this->Email_Educateur = $Email_Educateur;


    }

    public function setMotDePasse($Mdp_Educateur) {

        $this->Mdp_Educateur = $Mdp_Educateur;
       
    }

    public function setAdministrateur($Administrateur) {
      $this->Administrateur = $Administrateur;
       
    }

}

?>

