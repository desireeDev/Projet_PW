<?php



class LicencieDAO   {
    
    private $connexion;
    public function __construct(Connexion $connexion) {
        $this->connexion = $connexion;
    }


    public function createLicencie(Licencie $licencie) {
        try {
            $stmt = $this->connexion->pdo->prepare("INSERT INTO licencies(id, Nom_Licencie, Prenom_Licencie,id_cat) VALUES (?,?, ?,?)");
            $stmt->execute([ $licencie->getId(), $licencie->getNom(), $licencie->getPrenom() ,$licencie->getCodeRaccourci()]);
            return true;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs d'insertion ici
            return false;
        }
    }
    

 



    public function getLicencieById($Num_Licencie) {
        $query = "SELECT * FROM licencies WHERE id = ?";
        $result = $this->connexion->pdo->prepare($query);
        $result->execute([$Num_Licencie]);
        $row = $result->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return new Licencie($row['id'], $row['Nom_Licencie'], $row['Prenom_Licencie'],  $row['id_cat']);
        } else {
            return null;
        }
    }
    public function getAll() {
        try {
            $stmt = $this->connexion->pdo->query("SELECT * FROM licencies");
            $licencie = [];

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $licencie[] = new Licencie($row['id'],$row['Nom_Licencie'],$row['Prenom_Licencie'],$row['id_cat']);
            }
            
            return $licencie;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de rÃ©cupÃ©ration ici
            return [];
        }
    }

    public function updateLicencie(Licencie $licencie) {
        $id = $licencie->getId();
        $Nom_Licencie = $licencie->getNom();
        $Prenom_Licencie = $licencie->getPrenom();
    
        $id_cat = $licencie->getCodeRaccourci();

        $query = "UPDATE licencies
                  SET 
                  Nom_Licencie = ?, 
                  Prenom_Licencie = ?, 
                  id_cat    = ?
                  WHERE id = ?";

        $stmt = $this->connexion->pdo->prepare($query);
        $stmt->execute([$id,$Nom_Licencie,$Prenom_Licencie,$id_cat]);
    }

    public function deleteLicencie($licencieId) {
        try {
            $stmt = $this->connexion->pdo->prepare("DELETE FROM licencies WHERE id = ?");
            $stmt->execute([$licencieId]);
            return true;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de suppression ici
            return false;
        }
    }

    // Autres méthodes liées à la gestion des licenciés
      //  importation des licenciés

      public function importer($cheminFichier) {
        $file = fopen($cheminFichier, "r");
        while (($data = fgetcsv($file, 10000, ",")) !== FALSE) {
            $licencie = new Licencie();
            $licencie->setNom($data[0]);
            // Définir d'autres propriétés de l'objet Licencié...
            $this->createLicencie($licencie);
        }
        fclose($file);
    }

 //  exportation des licenciés

 public function exporter($cheminFichier) {
    $file = fopen($cheminFichier, "w");
    $licencies = $this->lister();
    foreach ($licencies as $licencie) {
        fputcsv($file, get_object_vars($licencie));
    }
    fclose($file);
}
}



    // ...


?>
