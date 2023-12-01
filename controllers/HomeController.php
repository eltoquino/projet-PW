<?php
class HomeController
{
    private $categorieDAO;

    public function __construct(CategorieDAO $categorieDAO)
    {
        $this->categorieDAO = $categorieDAO;
    }

    public function index()
    {
        // Récupérer la liste de toutes les catégories depuis le modèle
        $categories = $this->categorieDAO->getAll();

        // Inclure la vue pour afficher la liste des catégories
        include('views/home_categorie.php');
    }
}

?>