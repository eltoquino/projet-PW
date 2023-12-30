<?php
class ViewsCategorieController {

    private $categorieDAO;
    private $educateurDAO; 
    private $contactDAO ;
    private  $loginDAO;
    private $licencieDAO;

    public function __construct($categorieDAO,$licencieDAO,$contactDAO,$educateurDAO,$loginDAO) {
        $this->categorieDAO = $categorieDAO;
    }

    public function viewCategorie($categorieId) {
        $categorie = $this->categorieDAO->getById($categorieId);

        include('views/categorie/view_categorie.php');
    }
}


?>