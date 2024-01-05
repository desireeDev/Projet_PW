<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/css/style.css">

  </head>
<body>
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
<div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="images/undraw_remotely_2j6y.svg" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <p class="mb-4">Veuillez entrer vos informations.</p>
            </div>
            <form action="" method="post">
              <div class="form-group first">
                <label for="username">Email</label>
                <input type="text" class="form-control" id="email" name="email" required>

              </div>
              <div class="form-group last mb-4">
                <label for="password">Mot de passe</label>
                <input type="password" class="form-control" id="motDePasse" name="motDePasse" required>
              </div>
              <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Rappellez moi</span>
                  <input type="checkbox" checked="checked"/>
                  <div class="control__indicator"></div>
                </label>
              </div>
              <input type="submit" value="Se connecter" class="btn btn-block btn-primary">
              <span class="d-block text-left my-4 text-muted">&mdash; Possibilité de se connecter avec? &mdash;</span>
              
              <div class="social-login">
                <a href="#" class="facebook">
                  <span class="icon-facebook mr-3"></span> 
                </a>
                <a href="#" class="twitter">
                  <span class="icon-twitter mr-3"></span> 
                </a>
                <a href="#" class="google">
                  <span class="icon-google mr-3"></span> 
                </a>
              </div>
            </form>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>

  
    <script src="js/js/jquery-3.3.1.min.js"></script>
    <script src="js/js/popper.min.js"></script>
    <script src="js/js/bootstrap.min.js"></script>
    <script src="js/js/main.js"></script>













   

    
 
</body>
</html>
