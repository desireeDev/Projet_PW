<?php

class Contact {

    private $Code_Contact;

    private $Nom_Contact;

    private $Prenom_Contact;

    private $Email_Contact;

    private $Numero_Contact;

    private $Num_Licencie;



    public function __construct($Code_Contact,$Nom_Contact, $Prenom_Contact, $Email_Contact, $Numero_Contact,$Num_Licencie) {

        $this->Code_Contact = $Code_Contact;
        $this->Nom_Contact = $Nom_Contact;
        $this->Prenom_Contact = $Prenom_Contact;
        $this->Email_Contact = $Email_Contact;
        $this->Numero_Contact = $Numero_Contact;

        $this->Num_Licencie = $Num_Licencie;

     

    }



    public function getCode() {

        return $this->Code_Contact;

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

    
    public function getNum() {

        return $this->Num_Licencie;

    }

    

    

    public function setCode($Code_Contact) {

        $this->Code_Contact=$Code_Contact;

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
    
    public function setNumeroLicence($Num_Licencie) {

        $this->Num_Licencie=$Num_Licencie;

    }



    public function setTelephone($Numero_Contact) {

        $this->Numero_Contact=$Numero_Contact;

    }



    // Vous pouvez ajouter des mÃ©thodes supplÃ©mentaires ici pour manipuler les donnÃ©es du contact

}

?>

