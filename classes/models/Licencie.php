<?php

class Licencie {
    private $Num_Licencie;
    private $Nom_Licencie;
    private $Prenom_Licencie; 
    private $Code_Raccourci; 

    // Constructeur
    public function __construct($Num_Licencie, $Nom_Licencie, $Prenom_Licencie,$Code_Raccourci) {
        $this->Num_Licencie = $Num_Licencie;
        $this->Nom_Licencie = $Nom_Licencie;
        $this->Prenom_Licencie = $Prenom_Licencie;
      
        $this->Code_Raccourci = $Code_Raccourci;
        
    }

    // Getters
    public function getNum() {
        return $this->Num_Licencie;
    }

    public function getNom() {
        return $this->Nom_Licencie;
    }

    public function getPrenom() {
        return $this->Prenom_Licencie;
    }

 
    public function getCodeRaccourci() {
        return $this->Code_Raccourci;
    }

    // Setters
    public function setNumeroLicence($Num_Licencie) {
        $this->Num_Licencie = $Num_Licencie;
    }

    public function setNom($Nom_Licencie) {
        $this->Nom_Licencie = $Nom_Licencie;
    }

    public function setPrenom($Prenom_Licencie) {
        $this->Prenom_Licencie = $Prenom_Licencie;
    }


    public function setCodeRaccourci(Categories $categorie) {
        $this->Code_Raccourci = $Code_Raccourci;
    }

    // Recupération d'un tableau associatif à partir d'un objet

    public function getProperties() {
        return get_object_vars($this);
    }
  






    // ...
}

?>
