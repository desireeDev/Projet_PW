<?php
class HomeController {
    private $CategoriesDAO;
    private $ContactDAO;
    private $LicencieDAO;
    private $EducateursDAO;

    public function __construct(CategoriesDAO $CategoriesDAO , ContactDAO  $ContactDAO, LicencieDAO $LicencieDAO, EducateursDAO $EducateursDAO ) {
        $this->CategoriesDAO = $CategoriesDAO;
        $this->ContactDAO = $ContactDAO;
        $this->LicencieDAO = $LicencieDAO;
        $this->EducateursDAO = $EducateursDAO;
      
    }

    public function index() {
        // RÃ©cupÃ©rer la liste de tous les elements depuis le modÃ¨le
        $categories = $this->CategoriesDAO->getAll();
        $contacts = $this->ContactDAO->getAll();
        $licencie = $this->LicencieDAO->getAll();
        $educateur = $this->EducateursDAO->getAll();

        // Inclure la vue pour afficher la liste des categories
        include('../views/categories/home.php');
          // Inclure la vue pour afficher la liste des contacts

         include('../views/contact/home.php');

          // Inclure la vue pour afficher la liste des licencies

          include('../views/licencies/home.php');

             // Inclure la vue pour afficher la liste des educateurs

             include('../views/educateur/home.php');


    }
}

require_once("../config/config.php");
require_once("../classes/models/Connexion.php");
require_once("../classes/models/Categories.php");
require_once("../classes/dao/CategoriesDAO.php");
require_once("../classes/models/Contact.php");
require_once("../classes/dao/ContactDAO.php");
require_once("../classes/models/Licencie.php");
require_once("../classes/dao/LicencieDAO.php");
require_once("../classes/models/Educateur.php");
require_once("../classes/dao/EducateurDAO.php");

$CategoriesDAO=new CategoriesDAO(new Connexion());
$ContactDAO=new ContactDAO(new Connexion());
$LicencieDAO=new LicencieDAO(new Connexion());
$EducateursDAO=new EducateursDAO(new Connexion());

$controller=new HomeController($CategoriesDAO,$ContactDAO,$LicencieDAO ,$EducateursDAO);

$controller->index();

?>
