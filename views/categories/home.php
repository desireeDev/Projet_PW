


<h2>Liste des Catégories</h2>
<a href="../views/categories/create.php" > Creer  </a>

<ul>
    <?php foreach ($categories as $key => $categorie) {
    ?>
        <li>
            <strong>Nom:</strong> <?php echo $categorie->getCat(); ?>,
            <strong>Code Raccourci:</strong> <?php echo $categorie->getCodeRaccourci(); ?>
            <a href="../views/categories/update.php" > Modifier  </a>

         
        </li> <br>

       



    <?php }?>

    
</ul>
