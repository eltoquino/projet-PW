<?php
class HomeCategorieController
{
    private $categorieDAO;
    private $educateurDAO; 
    private $contactDAO ;
    private  $loginDAO;
    private $licencieDAO;

    public function __construct($categorieDAO,$licencieDAO,$contactDAO,$educateurDAO,$loginDAO)
    {
        $this->categorieDAO = $categorieDAO;
    }

    public function index()
    {
        // Récupérer la liste de toutes les catégories depuis le modèle
        $categories = $this->categorieDAO->getAll();

        // Inclure la vue pour afficher la liste des catégories
        include('views/categorie/home_categorie.php');
    }
}

?>