<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un contact</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
        <link rel="stylesheet" href="../css/styles.css">
   
</head>
<body>
    <h1>Ajouter un  contact</h1>
    <a href="../../controllers/HomeController.php"> Liste des differentes contacts  </a>
 

    <form action="../../controllers/ContactController.php "  method="post" >
        <label for="id">Numero du contact :</label>
        <input type="text" id="id" name="id" required><br>

        <label for="numLicencie">Numero du Licencie :</label>
        <input type="text" id="numLicencie" name="numLicencie" required><br>
        
        <label for="nom">Nom du Contact :</label>
        <input type="text" id="nom" name="nom" required><br>
        <label for="prenom">Prenom du Contact :</label>
        <input type="text" id="prenom" name="prenom" required><br>
        <label for="email">Email du Contact :</label>
        <input type="text" id="email" name="email" required><br>
        <label for="telephone">Telephone du contact :</label>
        <input type="text" id="telephone" name="telephone" required><br>

        <input type="submit" name="action" value="Ajouter">
    </form>

 
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
    <h1>Ajouter un  contact</h1>
    <a href="../../controllers/HomeController.php"> Liste des differentes contacts  </a>

		<div class="wrapper">
			<div class="inner">
				<img src="../../images/image-1.png" alt="" class="image-1">
				<form action="../../controllers/ContactController.php "  method="post">
					<h3>Ajout d'un contact?</h3>
					<div class="form-holder">
						<span class="lnr lnr-key"></span>
						<input type="text" class="form-control"  id="id" name="id" required placeholder="Numero du Licencie">
					</div>
					<div class="form-holder">
						<span class="lnr lnr-phone-handset"></span>
						<input type="text" class="form-control" placeholder="Phone Number">
					</div>
					<div class="form-holder">
						<span class="lnr lnr-envelope"></span>
						<input type="text" class="form-control" placeholder="Mail">
					</div>
					<div class="form-holder">
						<span class="lnr lnr-lock"></span>
						<input type="password" class="form-control" placeholder="Password">
					</div>
					<div class="form-holder">
						<span class="lnr lnr-lock"></span>
						<input type="password" class="form-control" placeholder="Confirm Password">
					</div>
					<button>
						<span>Register</span>
					</button>
				</form>
				<img src="../../images/image-2.png" alt="" class="image-2">
			</div>
			
		</div>
		
		<script src="../../js/jquery-3.3.1.min.js"></script>
		<script src="../../js/main.js"></script>
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>


















 
















    