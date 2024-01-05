<?php
require_once("../../config/config.php");
require_once("../../classes/models/Connexion.php");
require_once("../../classes/models/Educateur.php");
require_once("../../classes/dao/EducateurDAO.php");

$EducateursDAO=new EducateursDAO(new Connexion());

$educateurs = $EducateursDAO->getAll();
?>

<h2>Liste des Educateurs</h2>
<a href="create.php" > Créer  </a>
	<!-- LINEARICONS -->
    <link rel="stylesheet" href="../../fonts/linearicons/style.css">

<!-- STYLE CSS -->
<link rel="stylesheet" href="../../css/style.css">
<ul>
    <?php
    if (isset($educateurs) && (is_array($educateurs) || is_object($educateurs))) {
        foreach ($educateurs as $key => $educateur) {
            ?>
          <div class="container">
            <li>
                <strong>Email :</strong> <?php echo $educateur->getEmail(); ?>,
                <strong>Mot de passe:</strong> <?php echo $educateur->getMotDePasse(); ?>
                <strong>Role</strong> <?php echo $educateur->isAdmin(); ?>,
                <strong> Nom du licencie:</strong> <?php echo $educateur->getNum(); ?>,
                <a href="update.php?id=<?= $educateur->getEmail();?>"> Modifier  </a>
                <a href="delete.php?id=<?= $educateur->getEmail();?>"> Supprimer  </a>  
            </li>
            </div>
            <br>
            <?php
        }
    } 
    ?>
</ul>
