<?php
class EditContactController {
    private $contactDAO;

    public function __construct(ContactDAO $contactDAO) {
        $this->contactDAO = $contactDAO;
    }

    public function editContact($contactId) {
        // Récupérer le contact à modifier en utilisant son ID
        $contact = $this->contactDAO->getById($contactId);

        if (!$contact) {
            echo "Le contact n'a pas été trouvée.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $numero_tel = $_POST['numero_tel'];

            // Messages de débogage
            echo "Données du formulaire - Nom: $nom, Code: $prenom <br>";

            // Mettre à jour les détails de la catégorie
            $contact->setNom($nom);
            $contact->setPrenom($prenom);
            $contact->setEmail($email);
            $contact->setTelephone($numero_tel);

            // Appeler la méthode du modèle (ContactDAO) pour mettre à jour la Contact
            $resultatMiseAJour = $this->contactDAO->update($contact);

            // Messages de débogage
            echo "Résultat de la mise à jour : ";
            var_dump($resultatMiseAJour);

            if ($resultatMiseAJour) {
                // Rediriger vers la page de détails de contact après la modification
                header('Location:index_contact.php?page=homecontact');
                exit();
            } else {
                // Gérer les erreurs de mise à jour du contact
                echo "Erreur lors de la modification du contact.";
            }
        }

        // Inclure la vue pour afficher le formulaire de modification de la catégorie
        include('views/contact/edit_contact.php');
    }
}
?>
