<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Contact</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
        <link rel="stylesheet" href="../css/styles.css">
   
</head>
<body>
    <h1>Ajouter un Contact</h1>
    <a href="HomeController.php">Retour à la liste des contacts</a>

    <form action="AddContactController.php" method="post">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required><br>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required><br>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email"><br>

        <label for="telephone">Téléphone :</label>
        <input type="text" id="telephone" name="telephone"><br>

        <input type="submit" name="action" value="Ajouter">
    </form>

    <?php
    // Inclure ici la logique pour traiter le formulaire d'ajout de contact
    ?>

</body>
</html>

