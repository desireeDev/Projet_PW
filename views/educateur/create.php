<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
   
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
        <link rel="stylesheet" href="../css/styles.css">
   
</head>
<body>
    <h1>Ajouter un  educateur</h1>
    <a href="../../controllers/HomeController.php"> Liste des educateurs  </a>
 
    <form action="../../controllers/EducateurController.php "  method="post" >
        <label for="email">Email :</label>
        <input type="text" id="email" name="email" required><br>

        <label for="password">Mot de passe :</label>
        <input type="text" id="password" name="password" required><br>
        
        <label for="numLicencie">Numero de licencie :</label>
        <input type="text" id="numLicencie" name="numLicencie" required><br>

        <label for="admin">Role:</label>
        <input type="text" id="admin" name="admin" required><br>
        <input type="submit" name="action" value="Ajouter">
    </form>

 

















 
















    