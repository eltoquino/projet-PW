<?php
class LicencieModel
{
    private $id;
    private $numeroLicence;
    private $nom;
    private $prenom;
    private $contactId;
    private $categorieId;

    // Constructeur
    public function __constructold($id,$numeroLicence, $nom, $prenom, $contactId, $categorieId)
    {
        $this->id = $id;
        $this->numeroLicence = $numeroLicence;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->contactId = $contactId;
        $this->categorieId = $categorieId;
      

    }


    public function __construct($id,$numeroLicence, $nom, $prenom, $contactId, $categorieId,
    $nomcontact,$prenomcontact, $emailcontact, $telcontact, $nomcateg, $codecateg)
    {
        $this->id = $id;
        $this->numeroLicence = $numeroLicence;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->contactId = $contactId;
        $this->categorieId = $categorieId;
        $this->nomcontact = $nomcontact;
        $this->prenomcontact = $prenomcontact;
        $this->emailcontact = $emailcontact;
        $this->telcontact = $telcontact;
        $this->nomcateg = $nomcateg;
        $this->codecateg = $codecateg;

    }
    

    // Getters and setters
    public function getId()
    {
        return $this->id;
    }

    public function getNumeroLicence()
    {
        return $this->numeroLicence;
    }

    public function setNumeroLicence($numeroLicence)
    {
        $this->numeroLicence = $numeroLicence;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }


    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getNomLicencie()
    {
        return $this->nom.' '.$this->prenom;
    }

    public function getNomContact()
    {
        return $this->nomcontact.' '.$this->prenomcontact;
    }
    public function getEmailContact()
    {
        return $this->emailcontact ;
    }
    public function getTelcontact()
    {
        return $this->telcontact;
    }
    public function getNomcateg()
    {
        return $this->nomcateg;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function getContactId()
    {
        return $this->contactId;
    }

    public function setContactId($contactId)
    {
        $this->contactId = $contactId;
    }

    public function getCategorieId()
    {
        return $this->categorieId;
    }

    public function setCategorieId($categorieId)
    {
        $this->categorieId = $categorieId;
    }
}
?>