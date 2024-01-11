<?php
require_once("../../config/config.php");
require_once("../../classes/models/Connexion.php");
require_once("../../classes/models/Educateur.php");
require_once("../../classes/dao/EducateurDAO.php");

$EducateursDAO=new EducateursDAO(new Connexion());

$educateurs = $EducateursDAO->getAll();
?>

<h2 class ="text-center">Liste des Educateurs</h2>

	<!-- LINEARICONS -->
    <link rel="stylesheet" href="../../fonts/linearicons/style.css">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Intégration de Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<!-- STYLE CSS -->
<link rel="stylesheet" href="../../css/style.css">
<ul>
    <?php
    if (isset($educateurs) && (is_array($educateurs) || is_object($educateurs))) {
        foreach ($educateurs as $key => $educateur) {
            ?>
<div class="container mt-4">
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th>Email</th>
                <th>Numéro du licencié</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $educateur->getEmail(); ?></td>
                <td><?php echo $educateur->getId(); ?></td>
                <td>
                    <a href="update.php?id=<?= $educateur->getEdu(); ?>" class="btn btn-primary btn-sm">Modifier</a>
                    <a href="delete.php?id=<?= $educateur->getEdu(); ?>" class="btn btn-danger btn-sm">Supprimer</a>
                    <a href="create.php" class="btn btn-success btn-sm">Ajouter</a>
                </td>
            </tr>
            <!-- Ajoutez d'autres lignes si nécessaire -->
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
            <br>
            <?php
        }
    } 
    ?>
    <a href="../admin/admin.php" class="btn btn-success btn-sm">Accueil</a>
</ul>
