<?php
class DeleteCategorieController
{
    private $categorieDAO;

    public function __construct(CategorieDAO $categorieDAO)
    {
        $this->categorieDAO = $categorieDAO;
    }

    public function deleteCategorie()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
            // Récupérer l'ID de la catégorie à supprimer depuis l'URL
            $categorieId = $_GET['id'];

            // Supprimer la catégorie en utilisant la méthode delete du CategorieDAO
            if ($this->categorieDAO->deleteById($categorieId)) {
                // Rediriger vers la page d'accueil après la suppression
                header('Location: HomeController.php');
                exit();
            } else {
                // Gérer les erreurs de suppression de catégorie
                echo "Erreur lors de la suppression de la catégorie.";
            }
        } else {
            // Rediriger vers la page d'accueil si l'ID n'est pas spécifié ou la méthode HTTP n'est pas correcte
            header('Location: HomeController.php');
            exit();
        }
    }
}

require_once("../config/config.php");
require_once("../classes/dao/CategorieDAO.php");

$categorieDAO = new CategorieDAO($pdo);
$controller = new DeleteCategorieController($categorieDAO);

// Appeler la méthode de suppression de catégorie
$controller->deleteCategorie();
?>