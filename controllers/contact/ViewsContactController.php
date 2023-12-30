<?php
class ViewsContactController {

    private $contactDAO;
    private $categorieDAO;
    private $educateurDAO; 
    private  $loginDAO;
    private $licencieDAO;

    public function __construct($categorieDAO,$licencieDAO,$contactDAO,$educateurDAO,$loginDAO) {
        $this->contactDAO = $contactDAO;
    }

    public function viewContact($contactId) {
        $contact = $this->contactDAO->getById($contactId);

        include('views/Contact/view_contact.php');
    }
}


?>