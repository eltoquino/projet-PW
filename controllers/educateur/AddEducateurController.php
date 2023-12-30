<?php

 
class AddEducateurController {
    private $categorieDAO;
    private $licencieDAO;
    private $contactDAO;
    private $educateurDAO; 
    private  $loginDAO;

    public function __construct($categorieDAO,$licencieDAO,$contactDAO,$educateurDAO,$loginDAO) {
        $this->licencieDAO = $licencieDAO;
        $this->educateurDAO = $educateurDAO;
    }

    public function index() {
        $message="";

       // Récupérer la liste de toutes les catégories
          $licencies = $this->licencieDAO->getAll(); 
         // Var_dump($contacts);
        //  Var_dump($categories);
         // die();

        include('views/educateur/add_educateur.php'); 
    }
    
    public function addEducateur() {
        $message="";
        session_start();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire

             //Var_dump($_POST);
              //die();
              session_start();


            $licencie_id = $_POST['licencie_id'];
            $email = $_POST['email'];
			$password = $_POST['password'];
            $isAdmin =isset($_POST['isAdmin'])?1:0;
            $confirpassword=$_POST['confirpassword'];
            
            if($password!= $confirpassword)
            {
                $message="Les mots de passe doit etre identique";
                //  var_dump($message);
                 // die();
                header('Location:index.php?page=addeducateur');
                  //include('views/educateur/add_educateur.php'); 
                   exit();
            }
 
          
            $nouvelEducateur = new EducateurModel($licencie_id, $email,$password, $isAdmin,0,0,0);
         // Var_dump($nouvelLicencie);
          //die();
          
          $educa = $this->educateurDAO->getById($licencie_id);
          if($educa!=null)
          {
           
            $_SESSION['message'] = 'Cet educateur est déja ajouté';
            //var_dump($message);
            //  die();
           header('Location:index.php?page=addeducateur');
           
          // require('views/educateur/add_educateur.php'); 
             // exit();
              
          }
          else
          {
            if ($this->educateurDAO->create($nouvelEducateur)) {

                header('Location:index.php?page=homeeducateur');
                exit();
            } else {
                echo "Erreur lors de l'ajout de educateur.";
            }
          }
           
        }
        //include('views/add_contact.php');
         include (getcwd()."/views/educateur/add_educateur.php");
    }
}
?>