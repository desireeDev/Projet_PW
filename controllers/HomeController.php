<?php
class HomeController {
    private $CategoriesDAO;
    private $ContactDAO;

    public function __construct(CategoriesDAO $CategoriesDAO , ContactDAO  $ContactDAO ) {
        $this->CategoriesDAO = $CategoriesDAO;
        $this->ContactDAO = $ContactDAO;
      
    }

    public function index() {
        // RÃ©cupÃ©rer la liste de tous les elements depuis le modÃ¨le
        $categories = $this->CategoriesDAO->getAll();
        $contact = $this->ContactDAO->getAll();

        // Inclure la vue pour afficher la liste des categories
        include('../views/categories/home.php');
          // Inclure la vue pour afficher la liste des contacts

         include('../views/contact/home.php');


    }
}

require_once("../config/config.php");
require_once("../classes/models/Connexion.php");
require_once("../classes/models/Categories.php");
require_once("../classes/dao/CategoriesDAO.php");
require_once("../classes/models/Contact.php");
require_once("../classes/dao/ContactDAO.php");



$CategoriesDAO=new CategoriesDAO(new Connexion());
$ContactDAO=new ContactDAO(new Connexion());
$controller=new HomeController($CategoriesDAO,$ContactDAO);

$controller->index();

?>
