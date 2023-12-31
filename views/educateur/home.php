

<h2>Liste des Educateurs</h2>
<a href="../views/educateur/create.php" > Créer  </a>

<link rel="stylesheet" href="../../css/style.css">
<ul>
    <?php
    if (isset($educateurs) && (is_array($educateurs) || is_object($educateurs))) {
        foreach ($educateurs as $key => $educateur) {
            ?>
            <li>
                <strong>Email :</strong> <?php echo $educateur->getEmail(); ?>,
                <strong>Mot de passe:</strong> <?php echo $educateur->getMotDePasse(); ?>
                <strong>Role</strong> <?php echo $educateur->isAdmin(); ?>,
                <strong> Numero du licencié:</strong> <?php echo $educateur->getNum(); ?>,

                <a href="../views/educateur/update.php?id=<?= $educateur->getEmail();?>"> Modifier  </a>
                <a href="../views/educateur/delete.php?id=<?= $educateur->getEmail();?>"> Supprimer  </a>
     
                
            </li>
            <br>
            <?php
        }
    } 
    ?>
</ul>
