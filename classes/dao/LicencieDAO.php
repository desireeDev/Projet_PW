<?php



class LicencieDAO   {
    
    private $connexion;
    public function __construct(Connexion $connexion) {
        $this->connexion = $connexion;
    }


    public function createLicencie(Licencie $licencie) {
        try {
            $stmt = $this->connexion->pdo->prepare("INSERT INTO licencies (Num_Licencie, Nom_Licencie, Prenom_Licencie,Code_Raccourci) VALUES (?, ?, ?, ?)");
            $stmt->execute([ $licencie->getNum(), $licencie->getNom(), $licencie->getPrenom(),  $licencie->getCodeRaccourci()]);
            return true;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs d'insertion ici
            return false;
        }
    }
    

 



    public function getLicencieById($Num_Licencie) {
        $query = "SELECT * FROM licencies WHERE Num_Licencie = ?";
        $result = $this->connexion->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return new Licencie($row['Num_Licencie'], $row['Nom_Licencie'], $row['Prenom_Licencie'],  $row['Code_Raccourci']);
        } else {
            return null;
        }
    }
    public function getAll() {
        try {
            $stmt = $this->connexion->pdo->query("SELECT * FROM licencies");
            $licencie = [];

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $licencie[] = new Licencie($row['Num_Licencie'],$row['Nom_Licencie'],$row['Prenom_Licencie'],$row['Code_Raccourci']);
            }

            return $licencie;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de rÃ©cupÃ©ration ici
            return [];
        }
    }

    public function updateLicencie(Licencie $licencie) {
        $Num_Licencie = $licencie->getNum();
        $Nom_Licencie = $licencie->getNom();
        $Prenom_Licencie = $licencie->getPrenom();
    
        $Code_Raccourci = $licencie->getCategorie();

        $query = "UPDATE licencies
                  SET Num_Licencie = '?', 
                  Nom_Licencie = '?', 
                  Prenom_Licencie = '?', 
              
                  Code_Raccourci    = '?'
                  WHERE Num_Licencie = ?";

        return $this->connexion->query($query);
    }

    public function deleteLicencie($licencieId) {
        try {
            $stmt = $this->connexion->pdo->prepare("DELETE FROM licencies WHERE Num_Licencie = ?");
            $stmt->execute([$Num_Licencie]);
            return true;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de suppression ici
            return false;
        }
    }

    // Autres méthodes liées à la gestion des licenciés
    // ...
}

?>
