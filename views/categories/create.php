<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une categorie</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
        <link rel="stylesheet" href="../css/styles.css">
   
</head>
<body>
    <h1>Ajouter une catégorie</h1>
    <a href="CategorieController.php">Retour à la liste des categories</a>

    <form action=""  method="post" >
        <label for="libelle">NomCategorie :</label>
        <input type="text" id="libelle" name="libelle" required><br>

        <label for="code">codeRaccourci:</label>
        <input type="text" id="code" name="code" required><br>

       

        <input type="submit" name="action" value="Ajouter">
    </form>

    <?php
    // Inclure ici la logique pour traiter le formulaire d'ajout de categorie 

        require_once("../config/config.php") ;
        require_once("../config/config.php") ;
        require_once("../classes/dao/CategoriesDAO.php") ;
        require_once("../classes/models/Categories.php") ;
        require_once("../controllers/CategorieController.php") ;
        

        $action =  isset($_REQUEST['action']) ? $_REQUEST['action'] : "" ;

        if($action == "Ajouter"){
            $libelle =  isset($_POST['libelle']) ? $_POST['libelle'] : '' ;
            $code =  isset($_POST['code']) ? $_POST['code'] : '' ;

            if(!empty($libelle) and !empty($code)){
                $controller = new CategorieController(new Connexion()) ;

                $controller->create($code,$libelle);
            }
        }
    ?>

</body>
</html>

