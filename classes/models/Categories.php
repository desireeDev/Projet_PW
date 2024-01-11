<?php

class Categories {

    // Attributs

    private $Code_Raccourci;

    private $Nom_Cat;
    private $id;

    // Constructeur


    public function __construct($Code_Raccourci,$Nom_Cat,$id,) {

        $this->Code_Raccourci = $Code_Raccourci;
        $this->Nom_Cat = $Nom_Cat;
        $this->id = $id;
     

    }

    // Getters & Setters

    public function getCodeRaccourci() {

        return $this->Code_Raccourci;

    }



    public function getCat() {

        return $this->Nom_Cat;

    }
    public function getId() {

        return $this->id;

    }


    public function setCodeRaccourci($Code_Raccourci) {

        $this->Code_Raccourci=$Code_Raccourci;

    }

    public function setCat($Nom_Cat) {
            
            $this->Nom_Cat=$Nom_Cat;
    
        }


        public function setId($id) {

            $this->id=$id;
    
        }
    

   



   



  

}

?>

