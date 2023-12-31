<?php
class EditEducateurController {
    private $contactDAO;
    private $categorieDAO;
    private $educateurDAO; 
    private  $loginDAO;
    private $licencieDAO;

    public function __construct($categorieDAO,$licencieDAO,$contactDAO,$educateurDAO,$loginDAO) {
        $this->educateurDAO = $educateurDAO;
        $this->licencieDAO = $licencieDAO;
    }

    public function editEducateur($educateurId) {
        // Récupérer le contact à modifier en utilisant son ID
       
        $educateur = $this->educateurDAO->getById($educateurId);

        $licencies = $this->licencieDAO->getAll(); 

        if (!$educateur) {
            echo "Cet educateur n'a pas été trouvée.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $licencie_id = $_POST['licencie_id'];
            $email = $_POST['email']; 

            // Messages de débogage
            echo "Données du formulaire - Nom: $licencie_id, Code: $email <br>";

            // Mettre à jour les détails d educateur
            $educateur->setEmail($email);
            $educateur->setId($licencie_id); 
            var_dump($educateur);
            die();

            // Appeler la méthode du modèle (educateurDAO) pour mettre à jour la Educateur
            $resultatMiseAJour = $this->educateurDAO->update($educateur);

            // Messages de débogage
            echo "Résultat de la mise à jour : ";
            var_dump($resultatMiseAJour);

            if ($resultatMiseAJour) {
                // Rediriger vers la page de détails de contact après la modification
                header('Location:index.php?page=homeeducateur');
                exit();
            } else {
                // Gérer les erreurs de mise à jour du contact
                echo "Erreur lors de la modification d'éducateur.";
            }
        }

        // Inclure la vue pour afficher le formulaire de modification de la catégorie
        include('views/educateur/edit_educateur.php');
    }
}
?>
