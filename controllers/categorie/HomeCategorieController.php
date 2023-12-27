<?php
class HomeCategorieController
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
        include('views/categorie/home_categorie.php');
    }
}

?>