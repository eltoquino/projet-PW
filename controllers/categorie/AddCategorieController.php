<?php
class AddCategorieController {
    private $categorieDAO;
    private $educateurDAO; 
    private $contactDAO ;
    private  $loginDAO;
    private $licencieDAO;

    public function __construct($categorieDAO,$licencieDAO,$contactDAO,$educateurDAO,$loginDAO) {
        $this->categorieDAO = $categorieDAO;
    }

    public function index() {
        include('views/categorie/add_categorie.php'); 
    }
    
    public function addCategorie() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $nom = $_POST['nom'];
            $code = $_POST['code'];

            $nouvelleCategorie = new CategorieModel(0,$nom, $code,);
            if ($this->categorieDAO->create($nouvelleCategorie)) {
                header('Location:index.php?page=homecategorie');
                exit();
            } else {
                echo "Erreur lors de l'ajout de la categorie.";
            }
        }

        include('views/categorie/add_categorie.php');
    }
}
?>