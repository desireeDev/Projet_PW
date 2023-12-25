<?php
class ContactModel {
    private $id;
    private $nom;
    private $prenom;
    private $email;
    private $telephone;

    public function __construct($id,$nom, $prenom, $email, $telephone) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->telephone = $telephone;
    }

    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getTelephone() {
        return $this->telephone;
    }
    
    
    public function setId($id) {
        $this->id=$id;
    }

    public function setNom($nom) {
        $this->nom=$nom;
    }

    public function setPrenom($prenom) {
        $this->prenom=$prenom;
    }

    public function setEmail($email) {
        $this->email=$email;
    }

    public function setTelephone($telephone) {
        $this->telephone=$telephone;
    }

    // Vous pouvez ajouter des mÃ©thodes supplÃ©mentaires ici pour manipuler les donnÃ©es du contact
}
?>
