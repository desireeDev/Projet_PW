
<?php


    require_once('../../config/config.php');
    require_once('../../classes/models/Connexion.php');
    require_once('../../classes/models/Licencie.php');
    require_once('../../classes/dao/LicencieDAO.php');

    $code = isset($_REQUEST['id']) ? $_REQUEST['id'] : '' ;

    if(empty($code)){
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
    
    $dao = new LicencieDAO(new Connexion());

    $current_line = $dao->getLicencieById($code) ;

    if($current_line == null){
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Suppression des données d'un licencié</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
        <link rel="stylesheet" href="../css/styles.css">
        <a href="../../controllers/HomeController.php"> Liste des licencies  </a>            
</head>
<body>
 

    <form action="../../controllers/LicencieController.php"  method="post" >
        <label for="num">Numero du licencié :</label>
        <input type="text" id="num" value="<?=$current_line->getNum()?>" name="num" required><br>

        <label for="nom">Nom :</label>
        <input type="text" id="nom" value="<?=$current_line->getNom()?>" name="nom" required><br>

        <label for="prenom">Prenom :</label>
        <input type="text" id="prenom" value="<?=$current_line->getPrenom()?>" name="prenom" required><br>

        <label for="code">codeRaccourci:</label>
        <input type="text" id="code" name="code" value="<?=$current_line->getCodeRaccourci()?>" required><br>

        <input type="submit" name="action" value="Supprimer">
        
    </form>

</body>
</html>

