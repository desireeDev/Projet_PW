

<?php
    require_once("../../config/config.php");
    require_once("../../classes/models/Connexion.php");
    require_once("../../classes/models/Licence.php");
    require_once("../../classes/dao/LicencieDAO.php");

    $LicencieDAO=new LicencieDAO(new Connexion());

    $licence = $LicencieDAO->getAll();

?>


    <!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- LINEARICONS -->
		<link rel="stylesheet" href="../../fonts/linearicons/style.css">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="../../css/style.css">
	</head>

	<body>

    <a href="../../controllers/HomeController.php"> Liste des differents licenciés  </a>

		<div class="wrapper">
			<div class="inner">
				<img src="../../images/image-1.png" alt="" class="image-1">
				<form action="../../controllers/LicencieController.php "  method="post">
					<h3>Ajout d'un licencié?</h3>
					<div class="form-holder">
						<span class="lnr lnr-user"></span>
						<input type="text" class="form-control" id="num" name="num" required placeholder="Numero du licencié">
					</div>
					<div class="form-holder">
						<span class="lnr lnr-user"></span>
						<input type="text" class="form-control"  id="nom" name="nom"  required placeholder="Nom du Licencié">
					</div>

					<div class="form-holder">
						<span class="lnr lnr-user"></span>
						<input type="text" class="form-control" id="prenom" name="prenom" required  placeholder="Prenom d'un licencié ">
					</div>
                    <div class="form-holder">
						<span class="lnr lnr-envelope"></span>
						<input type="text" class="form-control" id="code" name="code" required placeholder="Code de la categorie">
					</div>


					<select name="code" id="code">
            
            <?php
                foreach ($categories as $key => $ctg) {
            ?>
            <option value="<?=$ctg->getCodeRaccourci()?>"><?=$ctg->getCat()?></option>
            <?php
                }
            ?>
        </select><br>
				
                    <input type="submit" name="action" value="Ajouter">
			
				</form>
				<img src="../../images/image-2.png" alt="" class="image-2">
			</div>
			
		</div>
		
		<script src="../../js/jquery-3.3.1.min.js"></script>
		<script src="../../js/main.js"></script>
	</body>
</html>


















 
















    
















 
















    