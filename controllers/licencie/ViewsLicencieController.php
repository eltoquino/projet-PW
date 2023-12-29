<?php
class ViewsLicencieController {

    private $licencieDAO;
    private $contactDAO;
    private $categorieDAO;

    public function __construct(CategorieDAO $categorieDAO,LicencieDAO $licencieDAO,ContactDAO $contactDAO) {
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