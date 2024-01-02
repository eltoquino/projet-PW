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

            
      
            
        // var_dump(password_hash(trim($motdepasse), PASSWORD_DEFAULT));
         // die();
        // password_verify($password, $passwordHash);
     //getEmail($email );
     //var_dump($this->loginDAO->getEmail($email));
    

     if($this->loginDAO->getEmail($email))
     {
       
        $row=$this->loginDAO->getEmail($email);
        $passwordHash=$row['mot_de_passe'];
      //  var_dump($row);
        //    var_dump($passwordHash);
        //    var_dump()  ;
      //  die();

             // if ($this->loginDAO->getConnexion($email,password_hash($motdepasse, PASSWORD_DEFAULT))) {
                if (password_verify($motdepasse, $passwordHash)) {

                $_SESSION['email'] = $email;
                header('Location:index.php?page=template');
                exit();
            } else {
               // echo "Erreur lors de l'ajout du licencie.";
                $error=true;
            }
        }
        else
        {
            $error=true;
        }


        }

        include('views/login.php');
         //require (getcwd()."/views/licencie/add_licencie.php");
    }
}
?>