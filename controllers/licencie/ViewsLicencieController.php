<?php
class ViewsLicencieController {

    private $categorieDAO;
    private $licencieDAO;
    private $contactDAO;
    private $educateurDAO; 
    private  $loginDAO;

    public function __construct($categorieDAO,$licencieDAO,$contactDAO,$educateurDAO,$loginDAO) {
        $this->licencieDAO = $licencieDAO;
        $this->contactDAO = $contactDAO;
        $this->categorieDAO = $categorieDAO;
    }

    public function viewLicencie($licencieId) {
        $licencie = $this->licencieDAO->getById($licencieId);

        

        include('views/Licencie/view_licencie.php');
    }
}


?>