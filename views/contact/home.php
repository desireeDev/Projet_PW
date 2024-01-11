<?php
require_once("../../config/config.php");
require_once("../../classes/models/Connexion.php");
require_once("../../classes/models/Contact.php");
require_once("../../classes/dao/ContactDAO.php");

$ContactDAO=new ContactDAO(new Connexion());

$contacts = $ContactDAO->getAll();
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Contacts</title>
    <!-- Ajouter le lien vers la bibliothèque Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
   
    
 	<!-- LINEARICONS -->
     <link rel="stylesheet" href="../../fonts/linearicons/style.css">

     <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }
        .container {
            margin-top: 50px;
        }
    </style>
</head>

<body>
<h2 class="text-center">Liste des Contacts</h2>

<ul>
<div class="container">
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Nom Contact</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Numéro du Licencié</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contacts as $contact) { ?>
                <tr>
                    <td><?php echo $contact->getNom(); ?></td>
                    <td><?php echo $contact->getPrenom(); ?></td>
                    <td><?php echo $contact->getEmail(); ?></td>
                    <td><?php echo $contact->getTelephone(); ?></td>
                    <td  ><?php echo $contact->getId(); ?></td>
                    <td class="text-center">
                        <a class="btn btn-warning" href="update.php?id=<?= $contact->getCode(); ?>">Modifier</a>
                        <a class="btn btn-danger" href="delete.php?id=<?= $contact->getCode(); ?>">Supprimer</a>
                        <a class="btn btn-success" href="create.php">Ajout de contact</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <a class="btn btn-primary return-btn" href="../admin/admin.php">Retour à l'accueil</a>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
