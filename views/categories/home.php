


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
                <strong>Nom:</strong> <?php echo $categorie->getCat(); ?>,
                <strong>Code Raccourci:</strong> <?php echo $categorie->getCodeRaccourci(); ?>

                
                <a href="../views/categories/update.php?id=<?= $categorie->getCodeRaccourci();?>"> Modifier  </a>
                <a href="../views/categories/delete.php?id=<?= $categorie->getCodeRaccourci();?>"> Supprimer  </a>
                
            </li>
            </div>
            <br>
            <?php
        }
    } 
    ?>
</ul>
