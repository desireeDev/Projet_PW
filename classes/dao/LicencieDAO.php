<?php



class LicencieDAO   {

    public function createLicencie(Licencie $licencie) {
        $Num_Licencie = $licencie->getNum();
        $Nom_Licencie = $licencie->getNom();
        $Prenom_Licencie = $licencie->getPrenom();
        $Contact_Licencie = $licencie->getContact()->getCode(); // Supposons que le contact a déjà été créé
        $Code_Raccourci = $licencie->getCategorie()->getCodeRaccourci(); // Supposons que la catégorie a déjà été créée

        $query = "INSERT INTO licencies (Num_Licencie, Nom_Licencie, Prenom_Licencie, Contact_Licencie, Contact_Licencie) 
                  VALUES ('?', '?', '?', ?, ?)";

        return $this->conn->query($query);
    }

    public function getLicencieById($Num_Licencie) {
        $query = "SELECT * FROM licencies WHERE Num_Licencie = ?";
        $result = $this->conn->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return new Licencie($row['Num_Licencie'], $row['Nom_Licencie'], $row['Prenom_Licencie'], $row['Contact_Licencie'], $row['Code_Raccourci']);
        } else {
            return null;
        }
    }

    public function getAllLicencies() {
        $licencies = array();

        $query = "SELECT * FROM licencies";
        $result = $this->conn->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $licencie = new Licencie($row['Num_Licencie'], $row['Nom_Licencie'], $row['Prenom_Licencie'], $row['Contact_Licencie'], $row['Code_Raccourci']);
                $licencie->setId($row['Num_Licencie']);
                $licencies[] = $licencie;
            }
        }

        return $licencies;
    }

    public function updateLicencie(Licencie $licencie) {
        $Num_Licencie = $licencie->getNum();
        $Nom_Licencie = $licencie->getNom();
        $Prenom_Licencie = $licencie->getPrenom();
        $Contact_Licencie = $licencie->getContact();
        $Code_Raccourci = $licencie->getCategorie();

        $query = "UPDATE licencies
                  SET Num_Licencie = '?', 
                  Nom_Licencie = '?', 
                  Prenom_Licencie = '?', 
                  Contact_Licencie   = '?',
                  Code_Raccourci    = '?'
                  WHERE Num_Licencie = ?";

        return $this->conn->query($query);
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
