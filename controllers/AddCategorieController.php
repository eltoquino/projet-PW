<?php
class AddCategorieController
{
    private $categorieDAO;

    public function __construct(CategorieDAO $categorieDAO)
    {
        $this->categorieDAO = $categorieDAO;
    }

    public function index()
    {
        // Inclure la vue pour afficher le formulaire d'ajout de catégorie
        include('views/add_categorie.php');
    }

    public function addCategorie()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $nom = $_POST['nom'];
            $code = $_POST['code'];

            // Valider les données du formulaire (ajoutez des validations si nécessaire)

            // Créer un nouvel objet CategorieModel avec les données du formulaire
            $nouvelleCategorie = new CategorieModel(0, $nom, $code);

            // Appeler la méthode du modèle (CategorieDAO) pour ajouter la catégorie
            if ($this->categorieDAO->create($nouvelleCategorie)) {
                // Rediriger vers la page d'accueil après l'ajout
                header('Location: HomeController.php');
                exit();
            } else {
                // Gérer les erreurs d'ajout de catégorie
                echo "Erreur lors de l'ajout de la catégorie.";
            }
        }
        include('views/add_categorie.php');
    }
}
?>