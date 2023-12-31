<link rel="stylesheet" href="../../css/style.css">

<h2>Liste des Contacts</h2>
<a href="../views/contact/create.php" > Créer  </a>
<ul>
    <?php
    if (isset($contact) && (is_array($contact) || is_object($contact))) {
        foreach ($contact as $key => $contacts) {
            ?>
            <li>
                <strong>CodeContact :</strong> <?php echo $contact->getCode(); ?>,
                <strong>Nom Contact:</strong> <?php echo $contact->getNom(); ?>
                <strong>Prenom:</strong> <?php echo $contact->getPrenom(); ?>,
                <strong>Email:</strong> <?php echo $contact->getEmail(); ?>,
                <strong>Telephone:</strong> <?php echo $contact->getTelephone(); ?>,
                <strong> Numero du licencié:</strong> <?php echo $contact->getNumL(); ?>,

                <a href="../views/contact/update.php?id=<?= $contact->getCode();?>"> Modifier  </a>
                <a href="../views/contact/delete.php?id=<?= $contact->getCode();?>"> Supprimer  </a>
     
                
            </li>
            <br>
            <?php
        }
    } 
    ?>
</ul>
