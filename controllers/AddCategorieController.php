<?php
class AddCategorieController {
    private $categorieDAO;

    public function __construct(CategorieDAO $categorieDAO) {
        $this->categorieDAO = $categorieDAO;
    }

    public function index() {
        include('views/add_categorie.php'); 
    }
    
    public function addCategorie() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $nom = $_POST['nom'];
            $code = $_POST['code'];

            $nouvelleCategorie = new CategorieModel(0,$nom, $code,);
            if ($this->categorieDAO->create($nouvelleCategorie)) {
                header('Location:index.php?page=homecat');
                exit();
            } else {
                echo "Erreur lors de l'ajout de la categorie.";
            }
        }

        include('views/add_categorie.php');
    }
}
?>