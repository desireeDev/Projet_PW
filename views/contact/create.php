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

 

















 
















    