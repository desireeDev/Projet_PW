
<?php


    require_once('../../config/config.php');
    require_once('../../classes/models/Connexion.php');
    require_once('../../classes/models/Contact.php');
    require_once('../../classes/dao/ContactDAO.php');

    require_once("../../classes/models/Licencie.php");
    require_once("../../classes/dao/LicencieDAO.php");

    $code = isset($_REQUEST['id']) ? $_REQUEST['id'] : '' ;

    if(empty($code)){
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
    
    $dao = new ContactDAO(new Connexion());

    $current_line = $dao->getByCode($code) ;

    if($current_line == null){
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }

    $LicencieDAO=new LicencieDAO(new Connexion());
    $licencies = $LicencieDAO->getAll();

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


    <form action="../../controllers/ContactController.php"  method="post" >
        <label for="id">Identifiant du Contact :</label>
        <input type="text" id="id" value="<?=$current_line->getCode()?>" name="libelle" required><br>

        <label for="nom">Nom du Contact:</label>
        <input type="text" id="nom" name="nom" value="<?=$current_line->getNom()?>" required><br>

        <label for="prenom">Prenom du contact:</label>
        <input type="text" id="prenom" name="prenom" value="<?=$current_line->getPrenom()?>" required><br>

        <label for="email">Email du contact:</label>
        <input type="text" id="email" name="email" value="<?=$current_line->getEmail()?>" required><br>

        <label for="telephone">Telephone du contact:</label>
        <input type="text" id="telephone" name="telephone" value="<?=$current_line->getTelephone()?>" required><br>


        <label for="numLicencie">Identite du licencie:</label>
        <select id="numLicencie" name="numLicencie" required>
            <?php
                foreach ($licencies as $key => $lic) {
            ?>
            <option <?=$current_line->getNum()==$lic->getNum() ? "selected" : "" ?> value="<?=$lic->getNum()?>"><?=$lic->getNom()?></option>
            <?php
                }
            ?>
        </select><br>

        <input type="submit" name="action" value="Modifier">
    </form>
    
    

</body>
</html>

