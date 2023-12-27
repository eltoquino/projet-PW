<?php
class DeleteContactController
{
    private $contactDAO;
    private $licencieDAO;

    public function __construct(ContactDAO $contactDAO,LicenceDAO $licencieDAO)
    {
        $this->contactDAO = $contactDAO;
        $this->licencieDAO = $licencieDAO;
    }

    public function deleteContact($contactId) {
        $contact = $this->contactDAO->getById($contactId);

        if (!$contact) {
            echo "Le contact n'a pas été trouvé.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          
            if($this->licencieDAO->deleteByContactId($contactId)){

                if ($this->contactDAO->deleteById($contactId)) {
                    // Rediriger vers la page d'accueil après la suppression
                    header('Location:index_contact.php?page=homecontact');
                    exit();
                } else {
                    echo "Erreur lors de la suppression du contact.";
                }
            }
            else{
                echo "Erreur lors de la suppression des liecenciés en relation avec ce contact.";
            }
           
        }

        include('views/contact/delete_contact.php');
    }
}

?>