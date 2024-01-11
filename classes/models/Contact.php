<?php

class Contact {

    private $id;

    private $Nom_Contact;

    private $Prenom_Contact;

    private $Email_Contact;

    private $Numero_Contact;

    private $id_licencie;



    public function __construct($id,$Nom_Contact, $Prenom_Contact, $Email_Contact, $Numero_Contact,$id_licencie) {

        $this->id = $id;
        $this->Nom_Contact = $Nom_Contact;
        $this->Prenom_Contact = $Prenom_Contact;
        $this->Email_Contact = $Email_Contact;
        $this->Numero_Contact = $Numero_Contact;
        $this->id_licencie = $id_licencie;  

    }



    public function getCode() {

        return $this->id;

    }



    public function getNom() {

        return $this->Nom_Contact;

    }



    public function getPrenom() {

        return $this->Prenom_Contact;

    }



    public function getEmail() {

        return $this->Email_Contact;

    }



    public function getTelephone() {

        return $this->Numero_Contact;

    }

    
    public function getId() {

        return $this->id_licencie;

    }

    public function setCode($id) {

        $this->id=$id;

    }



    public function setNom($Nom_Contact) {

        $this->Nom_Contact=$Nom_Contact;

    }



    public function setPrenom($Prenom_Contact) {

        $this->Prenom_Contact=$Prenom_Contact;

    }



    public function setEmail($Email_Contact) {

        $this->Email_Contact=$Email_Contact;

    }
    
    public function setNumeroLicence($id_licencie) {

        $this->id_licencie=$id_licencie;

    }



    public function setTelephone($Numero_Contact) {

        $this->Numero_Contact=$Numero_Contact;

    }



    // Vous pouvez ajouter des mÃ©thodes supplÃ©mentaires ici pour manipuler les donnÃ©es du contact

}

?>

