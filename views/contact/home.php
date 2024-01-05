

<h2>Liste des Contacts</h2>
<a href="views/contact/create.php" > Créer  </a>
<ul>
    <?php
    if (isset($contacts) && (is_array($contacts) || is_object($contacts))) {
        foreach ($contacts as $key => $contact) {
            ?>
            <li>
                <strong>CodeContact :</strong> <?php echo $contact->getCode(); ?>,
                <strong>Nom Contact:</strong> <?php echo $contact->getNom(); ?>
                <strong>Prenom:</strong> <?php echo $contact->getPrenom(); ?>,
                <strong>Email:</strong> <?php echo $contact->getEmail(); ?>,
                <strong>Telephone:</strong> <?php echo $contact->getTelephone(); ?>,
                <strong> Numero du licencié:</strong> <?php echo $contact->getNum(); ?>,

                <a href="../views/contact/update.php?id=<?= $contact->getCode();?>"> Modifier  </a>
                <a href="../views/contact/delete.php?id=<?= $contact->getCode();?>"> Supprimer  </a>
     	<!-- LINEARICONS -->
		<link rel="stylesheet" href="../../fonts/linearicons/style.css">

<!-- STYLE CSS -->
<link rel="stylesheet" href="../../css/style.css">
                
            </li>
            <br>
            <?php
        }
    } 
    ?>
</ul>
