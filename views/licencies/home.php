

<h2>Liste des Licencies</h2>
<a href="../views/licencies/create.php" > Créer  </a>
<ul>
    <?php
    if (isset($licencie) && (is_array($licencie) || is_object($licencie))) {
        foreach ($licencie as $key => $lic) {
            ?>
            <li>
                <strong>Numero du Licencie :</strong> <?php echo $lic->getNum(); ?>,
                <strong>Nom :</strong> <?php echo $lic->getNom(); ?>
                <strong>Prenom:</strong> <?php echo $lic->getPrenom(); ?>,
                <strong>Code la categorie:</strong> <?php echo $lic->getCodeRaccourci(); ?>,
                
                <a href="../views/licencies/update.php?id=<?= $lic->getNum();?>"> Modifier</a>

                <a href="../views/licencies/delete.php?id=<?= $lic->getNum();?>"> Supprimer </a>
     
                
            </li>
            <br>
            <?php
        }
    } 
    ?>
</ul>
