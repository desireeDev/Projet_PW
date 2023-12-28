<?php



class EducateurDAO  {

    public function createEducateur(Educateur $educateur) {
        $numeroLicence = $educateur->getNumeroLicence();
        $email = $educateur->getEmail();
        $motDePasse = $educateur->getMotDePasse();
        $administrateur = $educateur->isAdministrateur() ? 1 : 0;

        $query = "INSERT INTO educateurs ( Email_Educateur, Mdp_Educateur, Administrateur,Num_Licencie) 
                  VALUES ( '?', '?', '?','?')";

        return $this->conn->query($query);
    }

    public function getEducateurById($Code_Educateur) {
        $query = "SELECT * FROM educateurs WHERE Email_Educateur= ?";
        $result = $this->conn->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return new Educateur($row['Num_Licencie'], $row['Email_Educateur'], $row['Mdp_Educateur'], $row['Administrateur']);
        } else {
            return null;
        }
    }

    public function getAllEducateurs() {
        $educateurs = array();

        $query = "SELECT * educateurs";
        $result = $this->conn->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $educateur = new Educateur($row['Num_Licencie'], $row['Email_Educateur'], $row['Mdp_Educateur'], $row['Administrateur']);
                $educateur->setEmail($row['setEmail']);
                $educateurs[] = $educateur;
            }
        }

        return $educateurs;
    }

    public function updateEducateur(Educateur $educateur) {
      
            try {
                $stmt = $this->connexion->pdo->prepare("UPDATE educateurs SET Num_Licencie = ?, Email_Educateur = ?, Mdp_Educateur = ?,
                 Administrateur = ? WHERE setEmail = ?");
                $stmt->execute([$educateur->getMotDePasse(), $educateur->isAdministrateur(), $educateur->getEmail(),
                $educateur->getNumeroLicence()]);
                return true;
            } catch (PDOException $e) {
                // GÃ©rer les erreurs de mise Ã  jour ici
                return false;
            }
    
 
    }

    public function deleteEducateur($Email_Educateur) {
            try {
                $stmt = $this->connexion->pdo->prepare("DELETE FROM educateurs WHERE Email_Educateur = ?");
                $stmt->execute([$Email_Educateur]);
                return true;
            } catch (PDOException $e) {
                // GÃ©rer les erreurs de suppression ici
                return false;
            }
        
    }

    // Autres méthodes liées à la gestion des éducateurs
    // ...

}

?>
