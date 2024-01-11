<?php

class Licencie {
    private $id;
    private $Nom_Licencie;
    private $Prenom_Licencie; 
    private $id_cat; 

    // Constructeur
    public function __construct($id, $Nom_Licencie, $Prenom_Licencie,$id_cat) {
        $this->id = $id;
        $this->Nom_Licencie = $Nom_Licencie;
        $this->Prenom_Licencie = $Prenom_Licencie;
        $this->id_cat = $id_cat;
        
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->Nom_Licencie;
    }

    public function getPrenom() {
        return $this->Prenom_Licencie;
    }

 
    public function getCodeRaccourci() {
        return $this->id_cat;
    }

    // Setters
    public function setId($Num_Licencie) {
        $this->id = $id;
    }

    public function setNom($Nom_Licencie) {
        $this->Nom_Licencie = $Nom_Licencie;
    }

    public function setPrenom($Prenom_Licencie) {
        $this->Prenom_Licencie = $Prenom_Licencie;
    }


    public function setCodeRaccourci(Categories $categorie) {
        $this->id_cat = $id_cat;
    }

    // Recupération d'un tableau associatif à partir d'un objet

    public function getProperties() {
        return get_object_vars($this);
    }
  






    // ...
}

?>
