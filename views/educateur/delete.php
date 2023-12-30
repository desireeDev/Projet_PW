
<?php


    require_once('../../config/config.php');
    require_once('../../classes/models/Connexion.php');
    require_once('../../classes/models/Educateur.php');
    require_once('../../classes/dao/EducateursDAO.php');

    $code = isset($_REQUEST['id']) ? $_REQUEST['id'] : '' ;

    if(empty($code)){
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
    
    $dao = new EducateursDAO(new Connexion());

    $current_line = $dao->getByCode($code) ;

    if($current_line == null){
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }

?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Supprimer un contact</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
        <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Supprimer un contact</h1>
    <a href="../../controllers/HomeController.php">Retour à la liste des categories</a>


    <form action="../../controllers/EducateurController.php"  method="post" >
        <label for="email">Email de l'educateur :</label>
        <input type="text" id="email" value="<?=$current_line->getEmail()?>" name="email" required><br>

        <label for="password">Mot de passe:</label>
        <input type="text" id="password" name="password" value="<?=$current_line->getMotDePasse()?>" required><br>

    

        <label for="admin">Role de l'admin:</label>
        <input type="text" id="admin" name="admin" value="<?=$current_line->isAdmin()?>" required><br>


        <label for="numLicencie">Numero du licencié:</label>
        <input type="text" id="numLicencie" name="numLicencie" value="<?=$current_line->getNum()?>" required><br>

        <input type="submit" name="action" value="Supprimer">
    </form>
    
    

</body>
</html>

