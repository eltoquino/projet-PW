<?php
class AddContactController {
    private $contactDAO;

    public function __construct(ContactDAO $contactDAO) {
        $this->contactDAO = $contactDAO;
    }

    public function index() {
        include('views/contact/add_contact.php'); 
    }
    
    public function addContact() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
			$email = $_POST['email'];
            $telephone = $_POST['telephone'];
      
            $nouvelContact = new ContactModel(0,$nom, $prenom,$email, $telephone);
           Var_dump($nouvelContact);
          
            if ($this->contactDAO->create($nouvelContact)) {
                header('Location:index_Contact.php?page=homecontact');
                exit();
            } else {
                echo "Erreur lors de l'ajout du contact.";
            }
        }

        //include('views/add_contact.php');
         require (getcwd()."/views/contact/add_contact.php");
    }
}
?>