<?php
class DeleteLicencieController
{
    private $contactDAO;
    private $categorieDAO;
    private $educateurDAO; 
    private  $loginDAO;
    private $licencieDAO;

    public function __construct($categorieDAO,$licencieDAO,$contactDAO,$educateurDAO,$loginDAO)
    {
        $this->licencieDAO = $licencieDAO;
        $this->educateurDAO = $educateurDAO;
        
    }

    public function deleteLicencie($licencieId) {
        $licencie = $this->licencieDAO->getById($licencieId);

        if (!$licencie) {
            echo "Le licencie n'a pas été trouvé.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
           // var_dump($licencieId);
           // die();


           // $row=$this->licencieDAO->getByContactId($contactId);
        
           // if($row!=null)
           // {
                $roweduc=$this->educateurDAO->getById($licencieId);
                if($roweduc!=null)
                {
                    $this->educateurDAO->deleteById($licencieId);
                    $this->licencieDAO->deleteById($licencieId);
                   // $this->contactDAO->deleteById($contactId);
                }
                else
                {
                    $this->licencieDAO->deleteById($licencieId);
                    //$this->contactDAO->deleteById($contactId);
    
                }
    
           // }
           // else
           // {
    
             //   $this->contactDAO->deleteById($contactId);
    
           // }
           header('Location:index.php?page=homelicencie');
            exit();


 
          //  if($this->licencieDAO->deleteByContactId($contactId)){
/*
                if ($this->licencieDAO->deleteById($licencieId)) {
                    // Rediriger vers la page d'accueil après la suppression
                   // header('Location:index.php?page=homelicencie');
                    exit();
                } else {
                    echo "Erreur lors de la suppression du licencie.";
                }
                */
          //  }
           // else{
              //  echo "Erreur lors de la suppression des liecenciés en relation avec ce contact.";
           // }
           
        }

        include('views/licencie/delete_licencie.php');
    }
}

?>