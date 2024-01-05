
    <!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Enregistrement de categorie</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- LINEARICONS -->
		<link rel="stylesheet" href="../../fonts/linearicons/style.css">
		
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="../../css/style.css">
	</head>
	<body>
    <a href=".../../../controllers/HomeController.php"> Listes des categories  </a>
		<div class="wrapper">
			<div class="inner">
				<img src="../../images/image-1.png" alt="" class="image-1">
				<form action=" ../../controllers/CategorieController.php "  method="post">
					<h3>Nouvel Enregistrement?</h3>
					<div class="form-holder">
						<span class="lnr lnr-drop"></span>
						<input type="text" class="form-control" id="libelle" name="libelle"  placeholder="Nom de la Categorie"required >
					</div>
					<div class="form-holder">
						<span class="lnr lnr-pencil"></span>
						<input type="text" class="form-control" id="code" name="code" placeholder="Code de la categorie" required >
					</div>
				
                    <input type="submit" name="action" value="Ajouter">
				
				</form>
				<img src="images/image-2.png" alt="" class="image-2">
			</div>
			
		</div>
		
		<script src="js/jquery-3.3.1.min.js"></script>
		<script src="js/main.js"></script>
	</body>
</html>













    