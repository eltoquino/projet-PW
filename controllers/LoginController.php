<?php

 
class LoginController {
    private $licencieDAO;
    private $contactDAO;
    private $categorieDAO;
    private $educateurDAO;
    private $loginDAO;

    public function __construct(CategorieDAO $categorieDAO,LicencieDAO $licencieDAO,
            ContactDAO $contactDAO, EducateurDAO $educateurDAO,LoginDAO $loginDAO) {
        $this->licencieDAO = $licencieDAO;
        $this->contactDAO = $contactDAO;
        $this->categorieDAO = $categorieDAO;
        $this->educateurDAO = $educateurDAO;
        $this->loginDAO = $loginDAO;
    }

    public function index() {
        $error=false;
        //$notAdmin=false;
 
         // Var_dump($contacts);
        //  Var_dump($categories);
         // die();
        include('views/login.php'); 
    }
    
    public function isLogin() {
        $error=false;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire

       
          $educateur=$this->educateurDAO ->getAll();

         

            $email = $_POST['email'];
            $motdepasse = $_POST['motdepasse'];

            
      
            //$nouvelLicencie = new LicencieModel(0,$numero_licencie, $nom,$prenom, $contact_id,$categorie_id,
            //0,0,0,0,0,0);
         // Var_dump($nouvelLicencie);
          //die();
          

            if ($this->loginDAO->getConnexion($email,$motdepasse)) {

                $_SESSION['email'] = $email;
                header('Location:index.php?page=template');
                exit();
            } else {
               // echo "Erreur lors de l'ajout du licencie.";
                $error=true;
            }
        }

        include('views/login.php');
         //require (getcwd()."/views/licencie/add_licencie.php");
    }
}
?>