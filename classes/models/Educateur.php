<?php

class Educateur {
    private $Email_Educateur;
    private $Mdp_Educateur;
    private $Administrateur;  
    private $Num_Licencie;

    // Constructeur
    public function __construct( $Email_Educateur, $Mdp_Educateur, $Administrateur,$Num_Licencie) {
    
        $this->Email_Educateur = $Email_Educateur;
        $this->Mdp_Educateur = $Mdp_Educateur;
        $this->Administrateur = $Administrateur;
        $this->Num_Licencie = $Num_Licencie;
     
    }

    // Getters
    public function getNum() {
        return $this->Num_Licencie;
       
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

    public function setNumeroLicence($Num_Licencie) {
        $this->Num_Licencie = $Num_Licencie;

    
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

