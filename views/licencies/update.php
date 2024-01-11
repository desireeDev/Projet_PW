<?php


    require_once('../../config/config.php');
    require_once('../../classes/models/Connexion.php');
    require_once('../../classes/models/Licencie.php');
    require_once('../../classes/dao/LicencieDAO.php');
    require_once("../../classes/models/Categories.php");
    require_once("../../classes/dao/CategoriesDAO.php");

    $code = isset($_REQUEST['id']) ? $_REQUEST['id'] : '' ;

    if(empty($code)){
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
    
    $dao = new LicencieDAO(new Connexion());

    $current_line = $dao->getLicencieById($code) ;

    if($current_line == null){
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }

    $CategoriesDAO=new CategoriesDAO(new Connexion());

    $categories = $CategoriesDAO->getAll();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Modification  du licencie</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- LINEARICONS -->
		<link rel="stylesheet" href="../../fonts/linearicons/style.css">
		
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="../../css/style.css">
	</head>
	<body>
    <a href="home.php"> Listes des licencies </a>
		<div class="wrapper">
			<div class="inner">
				<img src="../../images/image-1.png" alt="" class="image-1">
                <form action="../../controllers/LicencieController.php"  method="post" >
					<h3>Voulez vous le modifier?</h3>
                    <div class="form-holder">
						<span class="lnr lnr-drop"></span>
						<input type="text" class="form-control"id="num" value="<?=$current_line->getId()?>" name="num" required  placeholder="Numéro du licencié" >
					</div>

                    <div class="form-holder">
						<span class="lnr lnr-drop"></span>
						<input type="text" class="form-control" id="nom" value="<?=$current_line->getNom()?>" name="nom"  placeholder="Nom du licencie"required >
					</div>

                    <div class="form-holder">
						<span class="lnr lnr-drop"></span>
						<input type="text" class="form-control" id="prenom" value="<?=$current_line->getPrenom()?>" name="prenom"  placeholder="Prenom du Licencie"required >
					</div>

                    
					<div class="form-holder">
						<span class="lnr lnr-pencil"></span>
                        <select id="code" name="code"  required>
                        <?php
                foreach ($categories as $key => $ctg) {
            ?>
            <option <?=$current_line->getCodeRaccourci()==$ctg->getCodeRaccourci() ? "selected" : "" ?> value="<?=$ctg->getCodeRaccourci()?>"><?=$ctg->getCat()?></option>
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


