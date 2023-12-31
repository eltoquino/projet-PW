<?php
class DeleteEducateurController
{
    private $categorieDAO;
    private $educateurDAO; 
    private $contactDAO ;
    private  $loginDAO;
    private $licencieDAO;

    public function __construct($categorieDAO,$licencieDAO,$contactDAO,$educateurDAO,$loginDAO)
    {
        $this->educateurDAO = $educateurDAO;
    }

    public function deleteEducateur($educateurId) {
        $educateur = $this->educateurDAO->getById($educateurId);

        if (!$educateur) {
            echo "Educateur n'a pas été trouvé.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($this->educateurDAO->deleteById($educateurId)) {
                // Rediriger vers la page d'accueil après la suppression
                header('Location:index.php?page=homeeducateur');
                exit();
            } else {
                echo "Erreur lors de la suppression educateur.";
            }
        }

        include('views/categorie/delete_categorie.php');
    }
}

?>