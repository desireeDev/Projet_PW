<?php

class EducateursDAO  {
//Ajout de la fonction  connexion
    private $connexion;

    public function __construct(Connexion $connexion) {
        $this->connexion = $connexion;
    }



public function createEducateur(Educateur $educateur) {
    try {
    
        $stmt = $this->connexion->pdo->prepare("INSERT INTO educateurs(Email_Educateur ,Mdp_Educateur, Administrateur,id_licencie,id) VALUES (?,?,?, ?,?)");
        $stmt->execute([ $educateur->getEmail(), sha1(md5($educateur->getMotDePasse())), $educateur->isAdmin(),$educateur->getId(),$educateur->getEdu()]);
        return true;
    } catch (PDOException $e) {
        // GÃ©rer les erreurs d'insertion ici
        var_dump("Désolé l'addresse mail ".$educateur->getEmail()." est déjà utilisé");
        die();
        return false;
    }
}
//Recupere par le code

    public function getByCode($id) {
        try {
            $stmt = $this->connexion->pdo->prepare("SELECT * FROM educateurs WHERE id = ?");
            $stmt->execute([$id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                return new Educateur($row['Email_Educateur'],$row['Mdp_Educateur'], $row['Administrateur'], $row['id_licencie'],$row['id']);
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
            $educateur[] = new Educateur($row['Email_Educateur'],$row['Mdp_Educateur'],$row['Administrateur'],$row['id_licencie'],$row['id']);
        }

        return $educateur;
    } catch (PDOException $e) {
        // GÃ©rer les erreurs de rÃ©cupÃ©ration ici
        return [];
    }
}

   

    public function Update(Educateur $educateur) {
        try {
            $stmt = $this->connexion->pdo->prepare("UPDATE educateurs SET  Email_Educateur = ? ,Mdp_Educateur = ?,  Administrateur = ?, id_licencie = ?
             WHERE  id = ?");
            $stmt->execute([$educateur->getMotDePasse(), $educateur->isAdmin(), $educateur->getId(), $educateur->getEmail(),$educateur->getEdu()]);
            return true;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de mise Ã  jour ici
            return false;
        }
    }
    public function Delete($id) {
            try {
                $stmt = $this->connexion->pdo->prepare("DELETE FROM educateurs WHERE id = ?");
                $stmt->execute([$id]);
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
                return new Educateur($row['Email_Educateur'],$row['Mdp_Educateur'], $row['Administrateur'], $row['id_licencie'],$row['id']);
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
