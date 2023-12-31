<?php

 
class LogoutController {
    private $licencieDAO;
    private $contactDAO;
    private $categorieDAO;
    private $educateurDAO;
    private $loginDAO;

    public function __construct(CategorieDAO $categorieDAO,LicencieDAO $licencieDAO,
            ContactDAO $contactDAO, EducateurDAO $educateurDAO,LoginDAO $loginDAO) {
        $this->licencieDAO = $licencieDAO;
        $this->contactDAO = $contactDAO;
        $this->categorieDAO = $categorieDAO;
        $this->educateurDAO = $educateurDAO;
        $this->loginDAO = $loginDAO;
    }

    public function index() {
        $error=false;
        //$notAdmin=false;
 
         // Var_dump($contacts);
        //  Var_dump($categories);
         // die();
        include('views/logout.php'); 
    }
    
 
}
?>