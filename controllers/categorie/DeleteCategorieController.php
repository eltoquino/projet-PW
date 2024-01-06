<?php
class DeleteCategorieController
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

    public function deleteCategorie($categorieId) {
        $categorie = $this->categorieDAO->getById($categorieId);

        if (!$categorie) {
            echo "La categorie n'a pas été trouvé.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($this->categorieDAO->deleteById($categorieId)) {
                // Rediriger vers la page d'accueil après la suppression
                header('Location:index.php?page=homecategorie');
                exit();
            } else {
                echo "Erreur lors de la suppression de la categorie.";
            }
        }

        include('views/categorie/delete_categorie.php');
    }
}

?>