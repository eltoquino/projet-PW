<?php
class EditCategorieController {
    private $categorieDAO;

    public function __construct(CategorieDAO $categorieDAO) {
        $this->categorieDAO = $categorieDAO;
    }

    public function editCategorie($categorieId) {
        // Récupérer la catégorie à modifier en utilisant son ID
        $categorie = $this->categorieDAO->getById($categorieId);

        if (!$categorie) {
            echo "La catégorie n'a pas été trouvée.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $nom = $_POST['nom'];
            $code = $_POST['code'];

            // Messages de débogage
            echo "Données du formulaire - Nom: $nom, Code: $code <br>";

            // Mettre à jour les détails de la catégorie
            $categorie->setNom($nom);
            $categorie->setCode($code);

            // Appeler la méthode du modèle (CategorieDAO) pour mettre à jour la catégorie
            $resultatMiseAJour = $this->categorieDAO->update($categorie);

            // Messages de débogage
            echo "Résultat de la mise à jour : ";
            var_dump($resultatMiseAJour);

            if ($resultatMiseAJour) {
                // Rediriger vers la page de détails de la catégorie après la modification
                header('Location:index.php?page=homecategorie');
                exit();
            } else {
                // Gérer les erreurs de mise à jour de la catégorie
                echo "Erreur lors de la modification de la catégorie.";
            }
        }

        // Inclure la vue pour afficher le formulaire de modification de la catégorie
        include('views/categorie/edit_categorie.php');
    }
}
?>
