<?php
require_once("../../config/config.php");
require_once("../../classes/models/Connexion.php");
require_once("../../classes/models/Categories.php");
require_once("../../classes/dao/CategoriesDAO.php");

$CategoriesDAO=new CategoriesDAO(new Connexion());

$categories = $CategoriesDAO->getAll();
?>
<head>
<!-- Styles Bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


<!-- Styles DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.6/css/dataTables.bootstrap4.min.css">

<!-- Bibliothèque jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables JavaScript -->
<script src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.6/js/dataTables.bootstrap4.min.js"></script>


<link rel="stylesheet" href="../../fonts/linearicons/style.css">

</head>
<h2 class ="text-center">Liste des Catégories</h2>




<div class="container">
    <table id="categoriesTable" class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Code Raccourci</th>
                <th scope="col" class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($categories) && (is_array($categories) || is_object($categories))) {
                foreach ($categories as $key => $categorie) {
                    ?>
                   <tr>
                <td><?php echo $categorie->getCat(); ?></td>
                <td><?php echo $categorie->getCodeRaccourci(); ?></td>
                <td class="text-center">
                    <a href="update.php?id=<?= $categorie->getId(); ?>" class="btn btn-warning" title="Modifier">
                        <i class="fas fa-pencil-alt"></i> Modifier
                    </a>
                    <a href="delete.php?id=<?= $categorie->getId(); ?>" class="btn btn-danger" title="Supprimer">
                        <i class="fas fa-trash-alt"></i> Supprimer
                    </a>
                    <button type="button" class="btn btn-primary" onclick="window.location.href='create.php'" title="Ajouter une catégorie">
                        <i class="fas fa-plus"></i> Ajouter
                    </button>
                </td>
            </tr>

                    <?php
                }
            } 
            ?>
        </tbody>
    </table>
    <a href="../admin/admin.php" class="btn btn-secondary mt-3">
        <i class="fas fa-arrow-left"></i> Retour à la page d'accueil
    </a>
</div>

<script>
    $(document).ready(function() {
        $('#categoriesTable').DataTable();
    });
</script>

