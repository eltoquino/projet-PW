<?php
class HomeContactController
{
    private $contactDAO;
    private $categorieDAO;
    private $educateurDAO; 
    private  $loginDAO;
    private $licencieDAO;

    public function __construct($categorieDAO,$licencieDAO,$contactDAO,$educateurDAO,$loginDAO)
    {
        $this->contactDAO = $contactDAO;
    }

    public function index()
    {
        // Récupérer la liste de toutes les catégories depuis le modèle
        $contacts = $this->contactDAO->getAll();

        // Inclure la vue pour afficher la liste des catégories
        include('views/contact/home_contact.php');
    }
}

?>