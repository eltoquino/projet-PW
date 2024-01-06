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
        $error="";
        $_SESSION['message']='';

       // Récupérer la liste de toutes les catégories
          $licencies = $this->licencieDAO->getAll(); 
         // Var_dump($contacts);
        //  Var_dump($categories);
         // die();

        include('views/educateur/add_educateur.php'); 
    }
    
    public function addEducateur() {
        $message="";
        $error="";
     

        //session_start();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire

             //Var_dump($_POST);
              //die();
              


            $licencie_id = $_POST['licencie_id'];
            $email = $_POST['email'];
			     $password = $_POST['password'];
            $isAdmin =isset($_POST['isAdmin'])?1:0;
            $confirmerpassword=$_POST['confirmerpassword'];
          //var_dump(ltrim($confirmerpassword) !==trim($password));
          //die();
           
            if((ltrim($confirmerpassword) !=trim($password)))
            {
              $_SESSION['message'] = 'Les mots de passe doivent etre identique';
                $error="Les mots de passe doivent etre identique";
                 
                 header("Location:index.php?page=addeducateur&ms=$error");
                  //include('views/educateur/add_educateur.php');
                   exit();
                    
            } 



            $educEmail = $this->educateurDAO->getByEmail(trim($email));
          
            if($educEmail)
            {
              $error="Cet email est déja pris en compte,veuillez bien changer de mail";
             // $_SESSION['message'] = 'Cet educateur est déja ajouté';
              
             header("Location:index.php?page=addeducateur&ms=$error");
             exit();
                
            }


        
            $password= password_hash(trim($password), PASSWORD_BCRYPT);
              // Var_dump($password);
            
          // die();
            $nouvelEducateur = new EducateurModel($licencie_id, $email,$password, $isAdmin,0,0,0);
         // Var_dump($nouvelLicencie);
          //die();
          
          $educa = $this->educateurDAO->getById($licencie_id);
          if($educa!=null)
          {
            $error="Cet educateur existe deja";
          $_SESSION['message'] = 'Cet educateur est déja ajouté';
            
           header("Location:index.php?page=addeducateur&ms=$error");
           
        //  include('views/educateur/add_educateur.php'); 
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