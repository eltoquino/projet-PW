<?php
class DeleteContactController
{
    private $contactDAO;
    private $categorieDAO;
    private $educateurDAO; 
    private  $loginDAO;
    private $licencieDAO;

    public function __construct($categorieDAO,$licencieDAO,$contactDAO,$educateurDAO,$loginDAO)
    {
        $this->contactDAO = $contactDAO;
        
    }

    public function deleteContact($contactId) {
        $contact = $this->contactDAO->getById($contactId);

        if (!$contact) {
            echo "Le contact n'a pas été trouvé.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          
          //  if($this->licencieDAO->deleteByContactId($contactId)){

                if ($this->contactDAO->deleteById($contactId)) {
                    // Rediriger vers la page d'accueil après la suppression
                    header('Location:index.php?page=homecontact');
                    exit();
                } else {
                    echo "Erreur lors de la suppression du contact.";
                }
          //  }
           // else{
              //  echo "Erreur lors de la suppression des liecenciés en relation avec ce contact.";
           // }
           
        }

        include('views/contact/delete_contact.php');
    }
}

?>