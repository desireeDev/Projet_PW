
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
	<?php
    require_once("../../config/config.php");
    require_once("../../classes/models/Connexion.php");
    require_once("../../classes/models/Licencie.php");
    require_once("../../classes/dao/LicencieDAO.php");

    $LicencieDAO=new LicencieDAO(new Connexion());
    $licencies = $LicencieDAO->getAll();
?>
	<body>

    <a href="home.php"> Liste des differents educateurs  </a>

		<div class="wrapper">
			<div class="inner">
				<img src="../../images/image-1.png" alt="" class="image-1">
				<form action="../../controllers/EducateurController.php "  method="post">
					<h3>Ajout d'un educateur?</h3>
					<div class="form-holder">
						<span class="lnr lnr-user"></span>
						<input type="text" class="form-control" id="email" name="email" required placeholder="Email d'un educateur">
					</div>
					<div class="form-holder">
						<span class="lnr lnr-user"></span>
						<input type="text" class="form-control" id="password" name="password"  required placeholder="Mot de passe">
					</div>

					<div class="form-holder">
						<span class="lnr lnr-user"></span>
						<input type="text" class="form-control" id="numLicencie" name="numLicencie" required  placeholder="Identite du licencie ">

						<select id="numLicencie" name="numLicencie" required>
            <?php
                foreach ($licencies as $key => $lic) {
            ?>
            <option value="<?=$lic->getNum()?>"><?=$lic->getNom()?></option>
            <?php
                }
            ?>
        </select><br>		
					</div>
                    <div class="form-holder">
						<span class="lnr lnr-envelope"></span>
						<input type="text" class="form-control" id="admin" name="admin" required placeholder="Role">
					</div>

                    <input type="submit" name="action" value="Ajouter">
			
				</form>
				<img src="../../images/image-2.png" alt="" class="image-2">
			</div>
			
		</div>
		
		<script src="../../js/jquery-3.3.1.min.js"></script>
		<script src="../../js/main.js"></script>
	</body>
</html>


















 
















    
















 
















    

















 
















    