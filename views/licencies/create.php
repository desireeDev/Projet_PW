<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un licensié</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
        <link rel="stylesheet" href="../css/styles.css">
   
</head>
<body>
    <h1>Ajouter un  contact</h1>
    <a href="../../controllers/HomeController.php"> Liste des differentes contacts  </a>
 

    <form action="../../controllers/LicencieController.php "  method="post" >
        <label for="num">Numero du Licencie :</label>
        <input type="text" id="num" name="num" required><br>

        <label for="nom">Nom du Licencie :</label>
        <input type="text" id="nom" name="nom" required><br>
        
        <label for="prenom">Prenom du Licencie :</label>
        <input type="text" id="prenom" name="prenom" required><br>

        <label for="contact"> Contact  du licencie:</label>
        <input type="text" id="contact" name="contact" required><br>


        <label for="code">Code de la categorie :</label>
        <input type="text" id="code" name="code" required><br>

        <input type="submit" name="action" value="Ajouter">
    </form>

 

















 
















    