<?php

 
class AddEducateurController {
    private $licencieDAO;
    private $educateurDAO;

    public function __construct(LicencieDAO $licencieDAO,EducateurDAO $educateurDAO) {
        $this->licencieDAO = $licencieDAO;
        $this->educateurDAO = $educateurDAO;
    }

    public function index() {

       // Récupérer la liste de toutes les catégories
          $licencies = $this->licencieDAO->getAll(); 
         // Var_dump($contacts);
        //  Var_dump($categories);
         // die();

        include('views/educateur/add_educateur.php'); 
    }
    
    public function addEducateur() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire

            Var_dump($_POST);
            die();


            $licencie_id = $_POST['licencie_id'];
            $email = $_POST['email'];
			$password = $_POST['password'];
            $isAdmin = $_POST['isAdmin'];


            if(!empty($case)){
                echo"Vous avez coché la case";}
                else
                {echo"Vous n'avez pas coché la case";
                }
      
            $nouvelEducateur = new EducateurModel($licencie_id, $email,$password, $isAdmin,0,0,0);
         // Var_dump($nouvelLicencie);
          //die();
          

            if ($this->educateurDAO->create($nouvelEducateur)) {
                header('Location:index_Educateur.php?page=homeeducateur');
                exit();
            } else {
                echo "Erreur lors de l'ajout de educateur.";
            }
        }

        //include('views/add_contact.php');
         require (getcwd()."/views/licencie/add_licencie.php");
    }
}
?>