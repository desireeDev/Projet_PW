

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

                <!-- Bouton d'importation -->
               <input type="file" id="importFile" style="display: none;">
               <button onclick="$('#importFile')[0].click();">Importer Licenciés</button>

              <!-- Bouton d'exportation -->
               <button id="exportButton">Exporter Licenciés</button>

                     <!-- Code d'Exportation et' d'importation -->

                     <script>
       $(document).ready(function() {
           var licenceController = new LicenceController();

           $('#importFile').change(function() {
               var file = this.files[0];
               var reader = new FileReader();
               reader.onload = function(e) {
                  licenceController.importerLicenciés(e.target.result);
               };
               reader.readAsDataURL(file);
           });

           $('#exportButton').click(function() {
               licenceController.exporterLicenciés('licenciés.csv');
           });
       });
   </script> 
     
                
            </li>
            <br>
            <?php
        }
    } 
    ?>
</ul>
