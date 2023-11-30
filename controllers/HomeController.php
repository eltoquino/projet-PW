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
        include('../views/home.php');
    }
}

require_once("../config/config.php");
require_once("../classes/models/CategorieModel.php");
require_once("../classes/dao/CategorieDAO.php");

// Initialisation de CategorieDAO
$categorieDAO = new CategorieDAO($pdo);

$controller = new HomeController($categorieDAO);
$controller->index();
?>