<?php
class HomeEducateurController
{
    private $licencieDAO;
    private $educateurDAO; 
    private $categorieDAO; 
    private $contactDAO ;
    private  $loginDAO;

  

    public function __construct(CategorieDAO  $categorieDAO,LicencieDAO $licencieDAO,ContactDAO $contactDAO,EducateurDAO $educateurDAO,$loginDAO)
    {
        $this->educateurDAO = $educateurDAO;
    }

    public function index()
    {
        // Récupérer la liste de tous les  educateurs depuis le modèle
        $educateurs = $this->educateurDAO->getAll();

        // var_dump($licencies);
        //die();

        // Inclure la vue pour afficher la liste des educateurs
        include('views/educateur/home_educateur.php');
    }
}

?>