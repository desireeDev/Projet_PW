
<?php
    require_once('../../config/config.php');
    require_once('../../classes/models/Connexion.php');
    require_once('../../classes/models/Contact.php');
    require_once('../../classes/dao/ContactDAO.php');

    require_once("../../classes/models/Licencie.php");
    require_once("../../classes/dao/LicencieDAO.php");

    $code = isset($_REQUEST['id']) ? $_REQUEST['id'] : '' ;

    if(empty($code)){
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
    
    $dao = new ContactDAO(new Connexion());

    $current_line = $dao->getByCode($code) ;

    if($current_line == null){
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }

    $LicencieDAO=new LicencieDAO(new Connexion());
    $licencies = $LicencieDAO->getAll();

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Modification  du contact</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- LINEARICONS -->
		<link rel="stylesheet" href="../../fonts/linearicons/style.css">
		
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="../../css/style.css">
	</head>
	<body>
    <a href="../../controllers/HomeController.php"> Listes des contacts </a>
		<div class="wrapper">
			<div class="inner">
				<img src="../../images/image-1.png" alt="" class="image-1">
				<form action=" ../../controllers/ContactController.php "  method="post">
					<h3>Voulez vous le modifier?</h3>
                    <div class="form-holder">
						<span class="lnr lnr-drop"></span>
						<input type="text" class="form-control" id="id" value="<?=$current_line->getCode()?>" name="libelle"   placeholder="Identifiant du Contact" required >
					</div>

                    <div class="form-holder">
						<span class="lnr lnr-drop"></span>
						<input type="text" class="form-control" id="nom" name="nom" value="<?=$current_line->getNom()?>"  placeholder="Nom du Contact"required >
					</div>

                    <div class="form-holder">
						<span class="lnr lnr-drop"></span>
						<input type="text" class="form-control" id="prenom" name="prenom" value="<?=$current_line->getPrenom()?>"  placeholder="Prenom du contact"required >
					</div>


                    <div class="form-holder">
						<span class="lnr lnr-drop"></span>
						<input type="text" class="form-control"  id="email" name="email" value="<?=$current_line->getEmail()?>"  placeholder="Email du contact"required >
					</div>





                    <div class="form-holder">
						<span class="lnr lnr-drop"></span>
						<input type="text" class="form-control" id="telephone" name="telephone" value="<?=$current_line->getTelephone()?>"  placeholder="Telephone du contact"required >
					</div>


					<div class="form-holder">
						<span class="lnr lnr-pencil"></span>
                        <select id="numLicencie" name="numLicencie" required>
            <?php
                foreach ($licencies as $key => $lic) {
            ?>
            <option <?=$current_line->getNum()==$lic->getNum() ? "selected" : "" ?> value="<?=$lic->getNum()?>"><?=$lic->getNom()?></option>
            <?php
                }
            ?>
        </select><br>

					</div>
				
                    <input type="submit" name="action" value="Modifier">



				
				</form>
				<img src="images/image-2.png" alt="" class="image-2">
			</div>
			
		</div>
		
		<script src="js/jquery-3.3.1.min.js"></script>
		<script src="js/main.js"></script>
	</body>
</html>
