

<h2>Liste des Licencies</h2>
<a href="../views/licencies/create.php" > Créer  </a>
<ul>
    <?php
    if (isset($licenses) && (is_array($licenses) || is_object($licenses))) {
        foreach ($license as $key => $licenses) {
            ?>
            <li>
                <strong>Numero du Licencie :</strong> <?php echo $licenses->getNum(); ?>,
                <strong>Nom :</strong> <?php echo $licenses->getNom(); ?>
                <strong>Prenom:</strong> <?php echo $licenses->getPrenom(); ?>,
                <strong>Code la categorie:</strong> <?php echo $licenses->getCodeRaccourci(); ?>,

                <a href="../views/contact/update.php?id=<?= $licenses->getNum();?>"> Modifier  </a>
                <a href="../views/contact/delete.php?id=<?= $licenses->getNum();?>"> Supprimer  </a>
     
                
            </li>
            <br>
            <?php
        }
    } 
    ?>
</ul>
