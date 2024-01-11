<?php
require_once("../../config/config.php");
require_once("../../classes/models/Connexion.php");
require_once("../../classes/models/Categories.php");
require_once("../../classes/dao/CategoriesDAO.php");

$CategoriesDAO=new CategoriesDAO(new Connexion());

$categories = $CategoriesDAO->getAll();


?>

<link rel="stylesheet" href="../../fonts/linearicons/style.css">
<h2>Liste des Catégories</h2>
<a href="create.php" > Créer </a>
<ul>
    <?php
    if (isset($categories) && (is_array($categories) || is_object($categories))) {
        foreach ($categories as $key => $categorie) {
            ?>
            <div class="container">
            <li>
                <strong>Code:</strong> <?php echo $categorie->getId(); ?>,
                <strong>Nom:</strong> <?php echo $categorie->getCat(); ?>,
                <strong>Code Raccourci:</strong> <?php echo $categorie->getCodeRaccourci(); ?>
                <a href="update.php?id=<?= $categorie->getId();?>"> Modifier  </a>
                <a href="delete.php?id=<?= $categorie->getId();?>"> Supprimer  </a>   
            </li>
            </div>
            <br>
            <?php
        }
    } 
    ?>
</ul>
