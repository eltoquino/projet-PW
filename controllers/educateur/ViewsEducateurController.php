<?php
class ViewsEducateurController {

    private $licencieDAO;

    public function __construct(LicencieDAO $licencieDAO,EducateurDAO $educateurDAO) {
        $this->licencieDAO = $licencieDAO;
        $this->contactDAO = $contactDAO;
    }

    public function viewEducateur($educateurId) {
        $educateur = $this->educateurDAO->getById($educateurId);

        

        include('views/Educateur/view_educateur.php');
    }
}


?>