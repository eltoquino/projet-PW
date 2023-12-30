<?php

 
class AddLicencieController {
    private $categorieDAO;
    private $licencieDAO;
    private $contactDAO;
    private $educateurDAO; 
    private  $loginDAO;

    public function __construct($categorieDAO,$licencieDAO,$contactDAO,$educateurDAO,$loginDAO) {
        $this->licencieDAO = $licencieDAO;
        $this->contactDAO = $contactDAO;
        $this->categorieDAO = $categorieDAO;
    }

    public function index() {

       // Récupérer la liste de toutes les catégories
          $contacts = $this->contactDAO->getAll();
          $categories = $this->categorieDAO->getAll();
         // Var_dump($contacts);
        //  Var_dump($categories);
         // die();


        include('views/licencie/add_licencie.php'); 
    }
    
    public function addLicencie() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire

          //  Var_dump($_POST);
           // die();


            $numero_licencie = $_POST['numero'];
            $nom = $_POST['nom'];
			$prenom = $_POST['prenom'];
            $contact_id = $_POST['contact_id'];
            $categorie_id = $_POST['categorie_id'];
      
            $nouvelLicencie = new LicencieModel(0,$numero_licencie, $nom,$prenom, $contact_id,$categorie_id,
            0,0,0,0,0,0);
         // Var_dump($nouvelLicencie);
          //die();
          

            if ($this->licencieDAO->create($nouvelLicencie)) {
                header('Location:index.php?page=homelicencie');
                exit();
            } else {
                echo "Erreur lors de l'ajout du licencie.";
            }
        }

        //include('views/add_contact.php');
         require (getcwd()."/views/licencie/add_licencie.php");
    }
}
?>