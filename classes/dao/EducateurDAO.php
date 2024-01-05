<?php

class EducateursDAO  {
//Ajout de la fonction  connexion
    private $connexion;

    public function __construct(Connexion $connexion) {
        $this->connexion = $connexion;
    }



public function createEducateur(Educateur $educateur) {
    try {
    
        $stmt = $this->connexion->pdo->prepare("INSERT INTO educateurs(Email_Educateur ,Mdp_Educateur, Administrateur,Num_Licencie) VALUES (?, ?,?, ?)");
        $stmt->execute([ $educateur->getEmail(), $educateur->getMotDePasse(), $educateur->isAdmin(),$educateur->getNum(),]);
        return true;
    } catch (PDOException $e) {
        // GÃ©rer les erreurs d'insertion ici
        var_dump($e);
        die();
        return false;
    }
}
//Recupere par le code

    public function getByCode($Email_Educateur) {
        try {
            $stmt = $this->connexion->pdo->prepare("SELECT * FROM educateurs WHERE Email_Educateur = ?");
            $stmt->execute([$Email_Educateur]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                return new Educateur($row['Email_Educateur'],$row['Mdp_Educateur'], $row['Administrateur'], $row['Num_Licencie']);
            } else {
                return null; // Aucun contact trouvÃ© avec cet ID
            }
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de rÃ©cupÃ©ration ici
            return null;
        }
    }

//Recup

public function getAll() {
    try {
        $stmt = $this->connexion->pdo->query("SELECT * FROM educateurs");
        $educateur = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $educateur[] = new Educateur($row['Email_Educateur'],$row['Mdp_Educateur'],$row['Administrateur'],$row['Num_Licencie'],);
        }

        return $educateur;
    } catch (PDOException $e) {
        // GÃ©rer les erreurs de rÃ©cupÃ©ration ici
        return [];
    }
}

   

    public function Update(Educateur $educateur) {
        try {
            $stmt = $this->connexion->pdo->prepare("UPDATE educateurs SET Mdp_Educateur = ?,  Administrateur = ?, Num_Licencie = ?
             WHERE  Email_Educateur = ?");
            $stmt->execute([$educateur->getMotDePasse(), $educateur->isAdmin(), $educateur->getNum(), $educateur->getEmail(),]);
            return true;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de mise Ã  jour ici
            return false;
        }
    }
    public function Delete($Email_Educateur) {
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
    public function getConnexion($Email_Educateur,$Mdp_Educateur) {
        try {
            $stmt = $this->connexion->pdo->prepare("SELECT * FROM educateurs WHERE Email_Educateur = ? AND Mdp_Educateur = ?");
            $stmt->execute([$Email_Educateur,$Mdp_Educateur]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                return new Educateur($row['Email_Educateur'],$row['Mdp_Educateur'], $row['Administrateur'], $row['Num_Licencie']);
            } else {
                return null; // Aucun contact trouvÃ© avec cet ID
            }
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de rÃ©cupÃ©ration ici
            return null;
        }
    }







    
 

}

?>
