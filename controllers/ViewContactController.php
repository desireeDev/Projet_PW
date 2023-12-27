<?php
class ViewContactController {
    private $contactDAO;

    public function __construct(ContactDAO $contactDAO) {
        $this->contactDAO = $contactDAO;
    }

    public function viewContact($contactId) {
        // Récupérer le contact à afficher en utilisant son ID
        $contact = $this->contactDAO->getById($contactId);

        // Inclure la vue pour afficher les détails du contact
        include('../views/view_contact.php');
    }
}

require_once("../config/config.php");
require_once("../classes/models/Connexion.php");
require_once("../classes/models/ContactModel.php");
require_once("../classes/dao/ContactDAO.php");
$contactDAO=new ContactDAO(new Connexion());
$controller=new ViewContactController($contactDAO);
$controller->viewContact($_GET['id']);


?>

