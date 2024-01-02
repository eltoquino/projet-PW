<?php

class ImporterLicencieController
{
    private $categorieDAO;
    private $licencieDAO;
    private $contactDAO;
    private $educateurDAO; 
    private  $loginDAO;

    public function __construct($categorieDAO,$licencieDAO,$contactDAO,$educateurDAO,$loginDAO)
    {
        $this->licencieDAO = $licencieDAO; 
        $this->contactDAO = $contactDAO;
        $this->categorieDAO = $categorieDAO;
        $this->educateurDAO = $educateurDAO;
    }
    public function index()
    {

       
        // Inclure la vue pour afficher la liste des licencies
        include('views/licencie/home_importation_licencie.php');
    }

 

    public function importLicencie() {
       // $login = $this->loginDAO->getAdmin(); LicencieDAO
        $licencie = $this->licencieDAO->getAll();
        $contact = $this->contactDAO->getAll();
        $categorie = $this->categorieDAO->getAll();
        //$export = $this->licencieDAO->getDataExport();

        if(isset($_POST['import'])){
            $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream','text/csv','application/csv','application/excel','application/vnd.msexcel','text/plain');
           /*
            var_dump($_FILES["file"]["tmp_name"]);
            var_dump($_FILES["file"]["name"]);
            var_dump(in_array($_FILES["file"]["type"], $csvMimes));
            var_dump(fopen($_FILES['file']['tmp_name'], 'r'));
            die();
            */
            

            $fileName = $_FILES["file"]["tmp_name"];
            
           

            $fileName = $_FILES["file"]["name"];
            $t = in_array($_FILES["file"]["type"], $csvMimes);
           // var_dump($fileName);
           // die();
            //var_dump($t);
            //var_dump(!empty($_FILES["file"]["name"]));
            //die();
            if(!empty($_FILES["file"]["name"]) && in_array($_FILES["file"]["type"], $csvMimes)){
                // var_dump($_FILES['file']['name']);
                if(is_uploaded_file($_FILES['file']['tmp_name'])){
                    $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
                  //   var_dump($csvFile);
                    
                    fgetcsv($csvFile);
                  //  die();

                    while(($line = fgetcsv($csvFile)) !== FALSE){
                         //var_dump($line[0]);
                        // die();
                        $id = $line[0];
                        $numero = $line[1];
                        $nom = $line[2];
                        $prenom = $line[3];
                        $idContact = $line[4];
                         $idCategorie = $line[5];
                        $nomContact = $line[6];
                        $prenomContact = $line[7];
                        $email = $line[8];
                        $telephone = $line[9];
                        
                        $nomCategorie = $line[10];
                        $code = $line[11];
                        //var_dump($id);
                        $i = 0;
                        
                     //   var_dump($nomCategorie);
                       // var_dump($code);
//die();
                        
                        //enregsitrer et recuperer l id categorie
                        $rowcateg=$this->categorieDAO->getByCode($code);
                       
                        if($rowcateg!=null)
                        {
                            $idCategorie=$rowcateg->getId();
                        }
                        else
                        {
                            $nouveauCategorie = new CategorieModel(0,$nomCategorie, $code);
                            $this->categorieDAO->create($nouveauCategorie);
                            $rowcateg=$this->categorieDAO->getByCode($code);
                            $idCategorie=$rowcateg->getId();
                        }

                       
                       

                        //verification ,enregistrer et recuperer l id contact
                        $rowcontact=$this->contactDAO->getVerifContact($nomContact,$prenomContact,$email,$telephone);
                        if($rowcontact!=null)
                        {
                            $idContact=$rowcontact['id'];
                        }
                        else
                        {
                            $nouveauContact = new ContactModel(0,$nomContact, $prenomContact, $email, $telephone);
                            $this->contactDAO->create($nouveauContact);
                            $rowcontact=$this->contactDAO->getVerifContact($nomContact,$prenomContact,$email,$telephone);
                            $idContact=$rowcontact['id'];

                        }
                        

                       // var_dump($rowcontact);
                       // var_dump($idContact);
                       // die();
                      

                        //enregistrer licencie
                        $nouveauLicencie = new LicencieModel(0,$numero, $nom, $prenom, $idContact, $idCategorie,0,0,0,0,0,0);
                        $this->licencieDAO->create($nouveauLicencie);
                        
                         
                        
                    }

                    fclose($csvFile);
                    
                    $qstring = '?status=succ';
                }else{
                    $qstring = '?status=err';
                }
            }else{
                $qstring = '?status=invalid_file';
            }

            $licencies = $this->licencieDAO->getAll();

            header('Location:index.php?page=homelicencie');
          //include('views/licencie/home_after_importation.php');


        }

            
            //var_dump($export);
            //die();

            // Inclure la vue pour afficher 
            include('views/licencie/home_after_importation.php');
    }
    
    





}

?>