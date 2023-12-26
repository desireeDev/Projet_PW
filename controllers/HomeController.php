<?php
class HomeController {
    private $CategoriesDAO;

    public function __construct(CategoriesDAO $CategoriesDAO) {
        $this->CategoriesDAO = $CategoriesDAO;
    }

    public function index() {
        // RÃ©cupÃ©rer la liste de tous les contacts depuis le modÃ¨le
        $categories = $this->CategoriesDAO->getAll();

        // Inclure la vue pour afficher la liste des contacts
        include('../views/categories/home.php');
    }
}

require_once("../config/config.php");
require_once("../classes/models/Connexion.php");
require_once("../classes/models/Categories.php");
require_once("../classes/dao/CategoriesDAO.php");
$CategoriesDAO=new CategoriesDAO(new Connexion());
$controller=new HomeController($CategoriesDAO);
$controller->index();

?>
