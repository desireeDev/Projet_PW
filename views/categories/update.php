<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier une categorie</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
        <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Modifier une categorie</h1>
    <a href="CategorieController.php">Modification  des categories</a>


    <form action=""  method="post" >
        <label for="libelle">NomCategorie :</label>
        <input type="text" id="libelle" name="libelle" required><br>

        <label for="code">codeRaccourci:</label>
        <input type="text" id="code" name="code" required><br>

        <input type="submit" name="action" value="Modifier">
    </form>
    
    <?php
    // Inclure ici la logique pour traiter le formulaire d'ajout de categorie 

   //Fonction ajouter categorieok

        require_once("../../config/config.php") ;
        require_once("../../classes/dao/CategoriesDAO.php") ;
        require_once("../../classes/models/Categories.php") ;
        require_once("../../classes/models/Connexion.php") ;
        require_once("../../controllers/CategorieController.php") ;

        

        $action =  isset($_REQUEST['action']) ? $_REQUEST['action'] : "" ;

        if($action == "Modifier"){
            $libelle =  isset($_POST['libelle']) ? $_POST['libelle'] : '' ;
            $code =  isset($_POST['code']) ? $_POST['code'] : '' ;

            if(!empty($libelle) and !empty($code)){
                $controller = new CategorieController(new Connexion()) ;

                $controller->Update($code,$libelle);
            }
        }
    ?>



</body>
</html>

