


<?php
    require_once('../../config/config.php');
    require_once('../../classes/models/Connexion.php');
    require_once('../../classes/models/Categories.php');
    require_once('../../classes/dao/CategoriesDAO.php');

    $code = isset($_REQUEST['id']) ? $_REQUEST['id'] : '' ;

    if(empty($code)){
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
    
    $dao = new CategoriesDAO(new Connexion());

    $current_line = $dao->getByCode($code) ;

    if($current_line == null){
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Suppression  de la categorie</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- LINEARICONS -->
		<link rel="stylesheet" href="../../fonts/linearicons/style.css">
		
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="../../css/style.css">
	</head>
	<body>
    <a href="home.php"> Listes des categories  </a>
		<div class="wrapper">
			<div class="inner">
				<img src="../../images/image-1.png" alt="" class="image-1">
				<form action=" ../../controllers/CategorieController.php "  method="post">
					<h3>Voulez vous la supprimer?</h3>
					<div class="form-holder">
						<span class="lnr lnr-drop"></span>
						<input type="text" class="form-control" id="libelle" name="libelle" value="<?=$current_line->getCat()?>"  placeholder="Nom de la Categorie"required >
					</div>
					<div class="form-holder">
						<span class="lnr lnr-pencil"></span>
						<input type="text" class="form-control" id="code" name="code"  value="<?=$current_line->getCodeRaccourci()?>" placeholder="Code de la categorie" required >
					</div>

					<div class="form-holder">
						<span class="lnr lnr-pencil"></span>
						<input type="text" class="form-control" id="idt" name="idt"  value="<?=$current_line->getId()?>" placeholder="Identfiant de la categorie" required >
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













    



