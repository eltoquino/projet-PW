<?php
class EditLicencieController {
    private $licencieDAO;
    private $contactDAO;
    private $categorieDAO;

  

    public function __construct(CategorieDAO $categorieDAO,LicencieDAO $licencieDAO,ContactDAO $contactDAO) {
        $this->licencieDAO = $licencieDAO;
        $this->contactDAO = $contactDAO;
        $this->categorieDAO = $categorieDAO;
    }


    public function editLicencie($licencieId) {
        // Récupérer la catégorie à modifier en utilisant son ID
        $contacts = $this->contactDAO->getAll();
          $categories = $this->categorieDAO->getAll();
        $licencie = $this->licencieDAO->getById($licencieId);

        if (!$licencie) {
            echo "Le licencié n'a pas été trouvé.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $numero_licencie = $_POST['numero'];
            $nom = $_POST['nom'];
			$prenom = $_POST['prenom'];
            $contact_id = $_POST['contact_id'];
            $categorie_id = $_POST['categorie_id'];

            // Messages de débogage
            echo "Données du formulaire - Nom: $nom, Code: $prenom <br>";

            // Mettre à jour les détails du licencie
            $licencie->setNumeroLicence($numero_licencie);
            $licencie->setNom($nom);
            $licencie->setPrenom($prenom);
            $licencie->setContactId($contact_id);
            $licencie->setCategorieId($categorie_id);

            // Appeler la méthode du modèle (CategorieDAO) pour mettre à jour la catégorie
            $resultatMiseAJour = $this->licencieDAO->update($licencie);

            // Messages de débogage
            echo "Résultat de la mise à jour : ";
            var_dump($resultatMiseAJour);

            if ($resultatMiseAJour) {
                // Rediriger vers la page de détails de la catégorie après la modification
                header('Location:index_licencie.php?page=homelicencie');
                exit();
            } else {
                // Gérer les erreurs de mise à jour de la catégorie
                echo "Erreur lors de la modification du licencié.";
            }
        }

        // Inclure la vue pour afficher le formulaire de modification de la catégorie
        include('views/licencie/edit_licencie.php');
    }
}
?>
