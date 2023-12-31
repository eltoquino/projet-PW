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
        $this->licencieDAO = $licencieDAO;
        $this->educateurDAO = $educateurDAO;
        
    }

    public function deleteContact($contactId) {
        $contact = $this->contactDAO->getById($contactId);

        if (!$contact) {
            echo "Le contact n'a pas été trouvé.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $row=$this->licencieDAO->getByContactId($contactId);
        
        if($row!=null)
        {
            $roweduc=$this->educateurDAO->getById($row->getId());
            if($roweduc!=null)
            {
                $this->educateurDAO->deleteById($row->getId());
                $this->licencieDAO->deleteById($row->getId());
                $this->contactDAO->deleteById($contactId);
            }
            else
            {
                $this->licencieDAO->deleteById($row->getId());
                $this->contactDAO->deleteById($contactId);

            }

        }
        else
        {

            $this->contactDAO->deleteById($contactId);

        }
        header('Location:index.php?page=homecontact');
        exit();
        //var_dump($row);
         //var_dump($row->getId());
          //   var_dump( $roweduc);
//die();
/*
            if($roweduc!=null)
            {
                var_dump('j suis la');  
                var_dump($row->getId());
                $this->educateurDAO->deleteById($row->getId());
            }
            if($row!=null)
            {
                $this->licencieDAO->deleteById($row->getId());
            }
       
       die();
       */

       //     var_dump($row);
        //    var_dump($row->getId());
        //    var_dump( $roweduc);
        //    die();

            /*
            if($this->licencieDAO->deleteByContactId($contactId)){

                if ($this->contactDAO->deleteById($contactId)) {
                    // Rediriger vers la page d'accueil après la suppression
                    header('Location:index.php?page=homecontact');
                    exit();
                } else {
                    echo "Erreur lors de la suppression du contact.";
                }
             }
            else{

              
                echo "Erreur lors de la suppression des liecenciés en relation avec ce contact.";
           }
           */
           
        }

        include('views/contact/delete_contact.php');
    }
}

?>