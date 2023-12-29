<?php


    require_once('../../config/config.php');
    require_once('../../classes/models/Connexion.php');
    require_once('../../classes/models/Categories.php');
    require_once('../../classes/dao/CategoriesDAO.php');

    $code = isset($_REQUEST['id']) ? $_REQUEST['id'] : '' ;

    if(empty($code)){
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
    
    $dao = new CategoriesDAO(new Connexion());

    $current_line = $dao->getByCode($code) ;

    if($current_line == null){
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier une categorie</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
        <link rel="stylesheet" href="../css/styles.css">
        <a href="../../controllers/HomeController.php"> List  </a>            
</head>
<body>
    <h1>Modifier une categorie</h1>

    <form action="../../controllers/CategorieController.php"  method="post" >
        <label for="libelle">NomCategorie :</label>
        <input type="text" id="libelle" value="<?=$current_line->getCat()?>" name="libelle" required><br>

        <label for="code">codeRaccourci:</label>
        <input type="text" id="code" name="code" value="<?=$current_line->getCodeRaccourci()?>" required><br>

        <input type="submit" name="action" value="Modifier">
    </form>

</body>
</html>

