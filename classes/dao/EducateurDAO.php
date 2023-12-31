<?php

class EducateursDAO  {
//Ajout de la fonction  connexion
    private $connexion;

    public function __construct(Connexion $connexion) {
        $this->connexion = $connexion;
    }



public function createEducateur(Educateur $educateur) {
    try {
        $stmt = $this->connexion->pdo->prepare("INSERT INTO educateurs (Email_Educateur ,Mdp_Educateur, Administrateur,Num_Licencie) VALUES (?, ?,?, ?)");
        $stmt->execute([ $educateur->getNum(), $educateur->getEmail(), $educateur->getMotDePasse(), $educateur->isAdmin()]);
        return true;
    } catch (PDOException $e) {
        // GÃ©rer les erreurs d'insertion ici
        return false;
    }
}
    
    public function getByCode($Email_Educateur) {
        $query = "SELECT * FROM educateurs WHERE Email_Educateur= ?";
        $result = $this->conn->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return new Educateur($row['Num_Licencie'], $row['Email_Educateur'], $row['Mdp_Educateur'], $row['Administrateur']);
        } else {
            return null;
        }
    }

//Recup

public function getAll() {
    try {
        $stmt = $this->connexion->pdo->query("SELECT * FROM educateurs");
        $educateur = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $educateur[] = new Educateur($row['Num_Licencie'],$row['Email_Educateur'],$row['Mdp_Educateur'],$row['Administrateur']);
        }

        return $educateur;
    } catch (PDOException $e) {
        // GÃ©rer les erreurs de rÃ©cupÃ©ration ici
        return [];
    }
}

    public function Update(Educateur $educateur) {
      
            try {
                $stmt = $this->connexion->pdo->prepare("UPDATE educateurs SET Num_Licencie = ?, Email_Educateur = ?, Mdp_Educateur = ?,
                 Administrateur = ? WHERE setEmail = ?");
                $stmt->execute([$educateur->getMotDePasse(), $educateur->isAdministrateur(), $educateur->getEmail(),   $educateur->getNumeroLicence()]);
             
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
    // Recuperation des informations de connexion
 

}

?>
