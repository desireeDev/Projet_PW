
<link rel="stylesheet" href="../../css/style.css">
<h2>Liste des Licencies</h2>
<a href="../views/licencies/create.php" > Créer  </a>
<ul>
    <?php
    if (isset($licencies) && (is_array($licencies) || is_object($licencies))) {
        foreach ($licencies as $key => $licencie) {
            ?>
            <li>
                <strong>Numero du Licencie :</strong> <?php echo $licencie->getNum(); ?>,
                <strong>Nom :</strong> <?php echo $licencie->getNom(); ?>
                <strong>Prenom:</strong> <?php echo $licencie->getPrenom(); ?>,
                <strong>Code la categorie:</strong> <?php echo $licencie->getCodeRaccourci(); ?>,

                <a href="../views/licencies/update.php?id=<?= $licencie->getNum();?>"> Modifier</a>
                <a href="../views/licencies/delete.php?id=<?= $licencie->getNum();?>"> Supprimer </a>
     
                
            </li>
            <br>
            <?php
        }
    } 
    ?>
</ul>
