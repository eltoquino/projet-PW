<?php

class EducateurModel   
{

    private $id;

    private $email;

    private $isAdmin;

    private $motDePasse;

    



    public function __construct($id, $email,$motDePasse,$isAdmin,$nom,$prenom,$numeroLicence)
    {

        $this->id = $id;

        $this->email = $email;

        $this->motDePasse = $motDePasse;

        $this->isAdmin = $isAdmin;

        $this->nom= $nom;

        $this->prenom= $prenom;
        
        $this->numeroLicence= $numeroLicence; 
    }



    public function getId()
    {

        return $this->id;
    }



    public function getEmail()
    {

        return $this->email;
    }



    public function getMotDePasse()
    {

        return $this->motDePasse;
    }



    public function getIsAdmin()
    {

        return $this->isAdmin;
    }

 
    public function getNomLicencie()
    {

        return $this->nom.' '.$this->prenom;
    }
    

    public function getNumeroLicence()
    {

        return $this->numeroLicence;
    }
    

    public function setId($id)
    {

        $this->id = $id;
    }



    public function setIsAdmin($isAdmin)
    {

        $this->isAdmin = $isAdmin;
    }

    public function setEmail($email)
    {

        $this->email = $email;
    }


    public function setMotDePasse($motDePasse)
    {

        $this->motDePasse = $motDePasse;
    }

 
    // Vous pouvez ajouter des mÃ©thodes supplÃ©mentaires ici pour manipuler les donnÃ©es
}
?>