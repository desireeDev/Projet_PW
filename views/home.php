<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une categorie</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
        <link rel="stylesheet" href="../css/styles.css">
   
</head>
<body>
    <h1>Ajouter un Contact</h1>
    <a href="CategorieController.php">Retour à la liste des categories</a>

    <form action="index.php?action=store"  method="post" >
        <label for="nom">NomCategorie :</label>
        <input type="text" id="nom" name="nom" required><br>

        <label for="prenom">codeRaccourci:</label>
        <input type="text" id="prenom" name="prenom" required><br>

       

        <input type="submit" name="action" value="Ajouter">
    </form>

    <?php
    // Inclure ici la logique pour traiter le formulaire d'ajout de contact
    ?>

</body>
</html>

