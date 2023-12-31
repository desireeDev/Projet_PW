<?php


    require_once('../../config/config.php');
    require_once('../../classes/models/Connexion.php');
    require_once('../../classes/models/Licencie.php');
    require_once('../../classes/dao/LicencieDAO.php');
    require_once("../../classes/models/Categories.php");
    require_once("../../classes/dao/CategoriesDAO.php");

    $code = isset($_REQUEST['id']) ? $_REQUEST['id'] : '' ;

    if(empty($code)){
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
    
    $dao = new LicencieDAO(new Connexion());

    $current_line = $dao->getLicencieById($code) ;

    if($current_line == null){
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }

    $CategoriesDAO=new CategoriesDAO(new Connexion());

    $categories = $CategoriesDAO->getAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier les données d'un licencié</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
        <link rel="stylesheet" href="../css/styles.css">
        <a href="../../controllers/HomeController.php"> List  </a>            
</head>
<body>
    <h1>Modification</h1>

    <form action="../../controllers/LicencieController.php"  method="post" >
        <label for="num">Numero du licencié :</label>
        <input type="text" id="num" value="<?=$current_line->getNum()?>" name="num" required><br>

        <label for="nom">Nom :</label>
        <input type="text" id="nom" value="<?=$current_line->getNom()?>" name="nom" required><br>

        <label for="prenom">Prenom :</label>
        <input type="text" id="prenom" value="<?=$current_line->getPrenom()?>" name="prenom" required><br>


        <label for="code">codeRaccourci:</label>
        <input type="text" id="code" name="code" value="<?=$current_line->getCodeRaccourci()?>" required><br>

        <?php
                foreach ($categories as $key => $ctg) {
            ?>
            <option <?=$current_line->getCodeRaccourci()==$ctg->getCodeRaccourci() ? "selected" : "" ?> value="<?=$ctg->getCodeRaccourci()?>"><?=$ctg->getCat()?></option>
            <?php
                }
            ?>

        <input type="submit" name="action" value="Modifier">

    </form>
   

</body>
</html>

