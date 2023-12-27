<?php
class HomeContactController
{
    private $contactDAO;

    public function __construct(ContactDAO $contactDAO)
    {
        $this->contactDAO = $contactDAO;
    }

    public function index()
    {
        // Récupérer la liste de toutes les catégories depuis le modèle
        $contacts = $this->contactDAO->getAll();

        // Inclure la vue pour afficher la liste des catégories
        include('views/contact/home_contact.php');
    }
}

?>