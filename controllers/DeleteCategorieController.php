<?php
class DeleteCategorieController
{
    private $categorieDAO;

    public function __construct(CategorieDAO $categorieDAO)
    {
        $this->categorieDAO = $categorieDAO;
    }

    public function deleteCategorie($categorieId) {
        $categorie = $this->categorieDAO->getById($categorieId);

        if (!$categorie) {
            echo "La categorie n'a pas été trouvé.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($this->categorieDAO->deleteById($categorieId)) {
                // Rediriger vers la page d'accueil après la suppression
                header('Location:index.php?page=home');
                exit();
            } else {
                echo "Erreur lors de la suppression de la categorie.";
            }
        }

        include('views/delete_categorie.php');
    }
}

?>