<?php
class ViewsContactController {

    private $contactDAO;

    public function __construct(ContactDAO $contactDAO) {
        $this->contactDAO = $contactDAO;
    }

    public function viewContact($contactId) {
        $contact = $this->contactDAO->getById($contactId);

        include('views/Contact/view_contact.php');
    }
}


?>