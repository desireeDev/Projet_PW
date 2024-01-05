<?php
require_once("../../config/config.php");
require_once("../../classes/models/Connexion.php");
require_once("../../classes/models/Contact.php");
require_once("../../classes/dao/ContactDAO.php");

$ContactDAO=new ContactDAO(new Connexion());

$contacts = $ContactDAO->getAll();
?>
<h2>Liste des Contacts</h2>
<a href="create.php" > Créer  </a>
<ul>
    <?php
    if (isset($contacts) && (is_array($contacts) || is_object($contacts))) {
        foreach ($contacts as $key => $contact) {
            ?>
            <div class="container">
            <li>
                <strong>CodeContact :</strong> <?php echo $contact->getCode(); ?>,
                <strong>Nom Contact:</strong> <?php echo $contact->getNom(); ?>
                <strong>Prenom:</strong> <?php echo $contact->getPrenom(); ?>,
                <strong>Email:</strong> <?php echo $contact->getEmail(); ?>,
                <strong>Telephone:</strong> <?php echo $contact->getTelephone(); ?>,
                <strong> Numero du licencié:</strong> <?php echo $contact->getNum(); ?>,

                <a href="update.php?id=<?= $contact->getCode();?>"> Modifier  </a>
                <a href="delete.php?id=<?= $contact->getCode();?>"> Supprimer  </a>
     	<!-- LINEARICONS -->
		<link rel="stylesheet" href="../../fonts/linearicons/style.css">


            </li>
            </div>
            <br>
            <?php
        }
    } 
    ?>
</ul>
