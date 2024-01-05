
<?php
    require_once('../../config/config.php');
    require_once('../../classes/models/Connexion.php');
    require_once('../../classes/models/Educateur.php');
    require_once('../../classes/dao/EducateurDAO.php');

    $code = isset($_REQUEST['id']) ? $_REQUEST['id'] : '' ;

    if(empty($code)){
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
    
    $dao = new EducateursDAO(new Connexion());

    $current_line = $dao->getByCode($code) ;

    if($current_line == null){
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Suppression d'un educateur</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- LINEARICONS -->
		<link rel="stylesheet" href="../../fonts/linearicons/style.css">
		
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="../../css/style.css">
	</head>
	<body>
    <a href="home.php"> Listes des educateurs </a>
		<div class="wrapper">
			<div class="inner">
				<img src="../../images/image-1.png" alt="" class="image-1">
				<form action=" ../../controllers/EducateurController.php"  method="post">
					<h3>Voulez vous supprimer celui-ci?</h3>
                    <div class="form-holder">
						<span class="lnr lnr-drop"></span>
						<input type="text" class="form-control" id="email" value="<?=$current_line->getEmail()?>" name="email"   placeholder="Email de l'educateur" required >
					</div>
                    <div class="form-holder">
						<span class="lnr lnr-drop"></span>
						<input type="text" class="form-control" id="password" name="password" value="<?=$current_line->getMotDePasse()?>"  placeholder="Mot de passe"required >
					</div>

                    <div class="form-holder">
						<span class="lnr lnr-drop"></span>
						<input type="text" class="form-control" id="admin" name="admin" value="<?=$current_line->isAdmin()?>"  placeholder="Role"required >
					</div>

					<div class="form-holder">
					<span class="lnr lnr-pencil"></span>
                     <input type="text" class="form-control" id="numLicencie" name="numLicencie" value="<?=$current_line->getNum()?>" placeholder="Numéro de licence"required >
					</div>
                    <input type="submit" name="action" value="Supprimer">
				</form>
				<img src="images/image-2.png" alt="" class="image-2">
			</div>
			
		</div>
		<script src="js/jquery-3.3.1.min.js"></script>
		<script src="js/main.js"></script>
	</body>
</html>






