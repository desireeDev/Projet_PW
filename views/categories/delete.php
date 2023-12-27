<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Supprimer une categorie</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
        <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Supprimer une categorie</h1>
    <a href="../../controllers/HomeController.php">Retour à la liste des categories</a>


    <form action="../../controllers/CategorieController.php"  method="post" >
        <label for="libelle">NomCategorie :</label>
        <input type="text" id="libelle" name="libelle" required><br>

        <label for="code">codeRaccourci:</label>
        <input type="text" id="code" name="code" required><br>

        <input type="submit" name="action" value="Supprimer">
    </form>
    
    



</body>
</html>

