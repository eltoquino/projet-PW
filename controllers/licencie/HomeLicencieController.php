<?php
class HomeLicencieController
{
    private $categorieDAO;
    private $licencieDAO;
    private $contactDAO;
    private $educateurDAO; 
    private  $loginDAO;

    public function __construct($categorieDAO,$licencieDAO,$contactDAO,$educateurDAO,$loginDAO)
    {
        $this->licencieDAO = $licencieDAO;
    }

    public function index()
    {
        // Récupérer la liste de toutes les licencies depuis le modèle
        $licencies = $this->licencieDAO->getAll();

       // var_dump( $licencies );
       // die();

        // var_dump($licencies);
        //die();

        // Inclure la vue pour afficher la liste des licencies
        include('views/licencie/home_licencie.php');
    }

    
    





}

?>