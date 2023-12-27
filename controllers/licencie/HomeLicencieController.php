<?php
class HomeLicencieController
{
    private $licencieDAO;
    private $contactDAO;
    private $categorieDAO;

    public function __construct(CategorieDAO $categorieDAO,LicencieDAO $licencieDAO,ContactDAO $contactDAO)
    {
        $this->licencieDAO = $licencieDAO;
    }

    public function index()
    {
        // Récupérer la liste de toutes les licencies depuis le modèle
        $licencies = $this->licencieDAO->getAll();

        // var_dump($licencies);
        //die();

        // Inclure la vue pour afficher la liste des licencies
        include('views/licencie/home_licencie.php');
    }
}

?>