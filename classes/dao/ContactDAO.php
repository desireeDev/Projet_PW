<?php
class ContactDAO {
    private $connexion;

    public function __construct(Connexion $connexion) {
        $this->connexion = $connexion;
    }

    // MÃ©thode pour insÃ©rer un nouveau contact dans la base de donnÃ©es
    public function create(Contact $contact) {
        try {
            $stmt = $this->connexion->pdo->prepare("INSERT INTO contact(Code_Contact, Nom_Contact, Prenom_Contact, Email_Contact,Numero_Contact,Num_Licencie) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([ $contact->getCode(), $contact->getNom(), $contact->getPrenom(), $contact->getEmail(), $contact->getTelephone(),$contact->getNum()]);
            return true;
        } catch (PDOException $e) {
            var_dump($e->getMessage());
            die();
            // GÃ©rer les erreurs d'insertion ici
            return false;
        }
    }

    // MÃ©thode pour rÃ©cupÃ©rer un contact par son ID
    public function getByCode($code) {
        try {
            $stmt = $this->connexion->pdo->prepare("SELECT * FROM contact WHERE Code_Contact = ?");
            $stmt->execute([$code]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                return new Contact($row['Code_Contact'],$row['Nom_Contact'], $row['Prenom_Contact'], $row['Email_Contact'], $row['Numero_Contact'],$row['Num_Licencie']);
            } else {
                return null; // Aucun contact trouvÃ© avec cet ID
            }
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de rÃ©cupÃ©ration ici
            return null;
        }
    }

    // MÃ©thode pour rÃ©cupÃ©rer la liste de tous les contacts
    public function getAll() {
        try {
            $stmt = $this->connexion->pdo->query("SELECT * FROM contact");
            $contacts = [];

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $contacts[] = new Contact($row['Code_Contact'],$row['Nom_Contact'], $row['Prenom_Contact'], $row['Email_Contact'], $row['Numero_Contact'],$row['Num_Licencie']);
            }

            return $contacts;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de rÃ©cupÃ©ration ici
            return [];
        }
    }

    // MÃ©thode pour mettre Ã  jour un contact
    public function Update(Contact $contact) {
        try {
            $stmt = $this->connexion->pdo->prepare("UPDATE contact SET Nom_Contact = ?, Prenom_Contact = ?, Email_Contact = ?,
             Numero_Contact = ?, Num_Licencie = ? WHERE Code_Contact = ?");
            $stmt->execute([$contact->getNom(), $contact->getPrenom(), $contact->getEmail(), $contact->getTelephone(),
            $contact->getNum(), $contact->getCode()]);
            return true;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de mise Ã  jour ici
            return false;
        }
    }

    // MÃ©thode pour supprimer un contact par son code
    public function deleteByCode($Code_Contact) {
        try {
            $stmt = $this->connexion->pdo->prepare("DELETE FROM contact WHERE Code_Contact = ?");
            $stmt->execute([$Code_Contact]);
            return true;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de suppression ici
            return false;
        }
    }
}
?>
