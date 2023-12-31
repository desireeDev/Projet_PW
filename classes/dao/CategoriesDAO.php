<?php
class CategoriesDAO {
    private $connexion;

    public function __construct(Connexion $connexion) {
        $this->connexion = $connexion;
    }

    // MÃ©thode pour insÃ©rer une nouvelle categorie dans la base de donnÃ©es
    public function create(Categories $categorie) {
        try {
            $stmt = $this->connexion->pdo->prepare("INSERT INTO categories(Code_Raccourci, Nom_Cat) VALUES (?, ?)");
            $stmt->execute([ $categorie->getCodeRaccourci(), $categorie->getCat()]);
            return true;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs d'insertion ici
            return false;
        }
    }

    // MÃ©thode pour rÃ©cupÃ©rer une categorie par son code
    public function getByCode($Code_Raccourci) {
        try {
            $stmt = $this->connexion->pdo->prepare("SELECT * FROM categories WHERE Code_Raccourci = ?");
            $stmt->execute([$Code_Raccourci]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                return new Categories($row['Code_Raccourci'],$row['Nom_Cat'] );
            } else {
                return null; // Aucun contact trouvÃ© avec cet ID
            }
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de rÃ©cupÃ©ration ici
            return null;
        }
    }

    // MÃ©thode pour rÃ©cupÃ©rer la liste de tous les categories
    public function getAll() {
        try {
            $stmt = $this->connexion->pdo->query("SELECT * FROM categories");
            $categorie = [];

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $categorie[] = new Categories($row['Code_Raccourci'],$row['Nom_Cat']);
            }

            return $categorie;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de rÃ©cupÃ©ration ici
            return [];
        }
    }

    // MÃ©thode pour mettre Ã  jour un contact
    public function update(Categories $categorie , $lastCode) {
        try {
            $stmt = $this->connexion->pdo->prepare("UPDATE categories SET  Nom_Cat=? , Code_Raccourci=? WHERE Code_Raccourci=?");
            $stmt->execute([$categorie->getCat(),  $categorie->getCodeRaccourci() , $lastCode]);
            return true;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de mise Ã  jour ici
            return false;
        }
    }

    // MÃ©thode pour supprimer une categorie par son code
    public function deleteByCode($Code_Raccourci) {
        try {
            $stmt = $this->connexion->pdo->prepare("DELETE FROM categories WHERE Code_Raccourci = ?");
            $stmt->execute([$Code_Raccourci]);
            return true;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de suppression ici
            return false;
        }
    }
}
?>
