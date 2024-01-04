<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <h2>Connexion</h2>
    
    <?php
    // Gestion de la soumission du formulaire
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        require_once("config/config.php");
        require_once("classes/models/Connexion.php");
        require_once("classes/models/Educateur.php");
        require_once("classes/dao/EducateurDAO.php");
        

        // Récupérer les données du formulaire
        $email = $_POST["email"];
        $motDePasse = $_POST["motDePasse"];

        // Vérifier l'authentification
        $educateurDAO = new EducateursDAO(new Connexion()); 
        $educateur = $educateurDAO->getConnexion($email, $motDePasse);

        if ($educateur) {
            // Démarrer la session et stocker l'ID de l'éducateur
            session_start();
            $_SESSION["educateur"] = $educateur;

            // Rediriger vers la page d'accueil
            header("Location:views/admin/admin.php");
            exit();
        } else {
            echo "<p>Identifiants incorrects. Veuillez réessayer.</p>";
        }
    }
    ?>
    <!-- Formulaire de connexion -->
    <form method="post" action="">
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required><br>

        <label for="motDePasse">Mot de passe:</label>
        <input type="password" id="motDePasse" name="motDePasse" required><br>

        <input type="submit" value="Se connecter">
    </form>
</body>
</html>
