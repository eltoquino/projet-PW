<?php
class ViewsCategorieController {

    private $categorieDAO;

    public function __construct(CategorieDAO $categorieDAO) {
        $this->categorieDAO = $categorieDAO;
    }

    public function viewCategorie($categorieId) {
        $categorie = $this->categorieDAO->getById($categorieId);

        include('views/categorie/view_categorie.php');
    }
}


?>