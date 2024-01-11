
<?php
require_once("../../config/config.php");
require_once("../../classes/models/Connexion.php");
require_once("../../classes/models/Licencie.php");
require_once("../../classes/dao/LicencieDAO.php");

$LicencieDAO=new LicencieDAO(new Connexion());
$licencie = $LicencieDAO->getAll();
?>





<h2>Liste des Licencies</h2>
<a href="create.php" > Créer  </a>
	<!-- LINEARICONS -->
    <link rel="stylesheet" href="../../fonts/linearicons/style.css">

<!-- STYLE CSS -->
<link rel="stylesheet" href="../../css/style.css">
<ul>
    <?php
    if (isset($licencie) && (is_array($licencie) || is_object($licencie))) {
        foreach ($licencie as $key => $lic) {
            ?>
            <div class="container">
            <li>
                <strong>Numero du Licencie :</strong> <?php echo $lic->getId(); ?>,
                <strong>Nom :</strong> <?php echo $lic->getNom(); ?>
                <strong>Prenom:</strong> <?php echo $lic->getPrenom(); ?>,
                <strong>Code la categorie:</strong> <?php echo $lic->getCodeRaccourci(); ?>,
                
                <a href="update.php?id=<?= $lic->getId();?>"> Modifier</a>

                <a href="delete.php?id=<?= $lic->getId();?>"> Supprimer </a>

                <!-- Bouton d'importation -->
               <input type="file" id="importFile" style="display: none;">
               <button onclick="$('#importFile')[0].click();">Importer Licenciés</button>

              <!-- Bouton d'exportation -->
               <button id="exportButton">Exporter Licenciés</button>

                     <!-- Code d'Exportation et' d'importation -->
                     <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>     
            </li>
            </div>
            <br>
            <?php
        }
    } 
    ?>
</ul>
