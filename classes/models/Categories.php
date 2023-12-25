<?php

class Categories {

    // Attributs
    private $Code_Raccourci;

    private $Nom_Cat;

    // Constructeur


    public function __construct($Code_Raccourci,$Nom_Cat) {

        $this->Code_Raccourci = $Code_Raccourci;
        $this->Nom_Cat = $Nom_Cat;
     

    }



    public function getCodeRaccourci() {

        return $this->Code_Raccourci;

    }



    public function getCat() {

        return $this->Nom_Cat;

    }



    public function setCodeRaccourci($Code_Raccourci) {

        $this->Code_Raccourci=$Code_Raccourci;

    }

    public function setCat($Nom_Cat) {
            
            $this->Nom_Cat=$Nom_Cat;
    
        }




   



   



  

}

?>

