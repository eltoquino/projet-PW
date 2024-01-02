<?php

class ContactDAO
{

    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }


    public function create(ContactModel $contact)
    {
        try {
            $query ="INSERT INTO Contacts (nom, prenom,email,numero_tel) VALUES (?, ?, ?, ?)";
          
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$contact->getNom(), $contact->getPrenom(), $contact->getEmail(), $contact->getTelephone()]);
            
            return true;
        } catch (PDOException $e) {

            return false;
        }
    }
 

    public function getById($id)
    {
        try {
            $query = "SELECT * FROM Contacts WHERE id = ?";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                return new ContactModel($row['id'], $row['nom'], $row['prenom'],$row['email'],$row['numero_tel']);
            } else {
                return null;
            }
        } catch (PDOException $e) {

            return null;
        }
    }


    public function getAll()
    {
        try {
            $query = "SELECT * FROM Contacts";
            $stmt = $this->pdo->query($query);
            $contact = [];

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $contact[] = new ContactModel($row['id'], $row['nom'], $row['prenom'],$row['email'],$row['numero_tel']);
            }

            return $contact;
        } catch (PDOException $e) {

            return [];
        }
    }


    public function update(ContactModel $contact)
    {
        try {
            $query = "UPDATE Contacts SET nom = ?, prenom = ?,email = ?, numero_tel = ? WHERE id = ?";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$contact->getNom(), $contact->getPrenom(), $contact->getEmail(), $contact->getTelephone(),$contact->getId()]);
            return true;
        } catch (PDOException $e) {

            return false;
        }
    }


    public function deleteById($id)
    {
        try {

            

            $query = "DELETE FROM Contacts WHERE id = ?";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$id]);
            return true;
        } catch (PDOException $e) {

            return false;
        }
    }


    public function getVerifContact($nom,$prenom,$email,$telephone) {
        
            $a = [
                'nom'     =>$nom,
                'prenom'  =>  $prenom,
                'email'  =>  $email,
                'telephone'  =>  $telephone,
                
            ];
            try {
                $query = "SELECT * FROM contacts WHERE nom = ? AND prenom= ? AND email= ? AND numero_tel= ?  limit 1";  
                $stmt = $this->pdo->prepare($query);
                $stmt->execute([$nom,$prenom,$email,$telephone]);
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
              
                 
                return $row;
                
                
                return $row;
            } catch (PDOException $e) {
                // GÃ©rer les erreurs de rÃ©cupÃ©ration ici
                return [];
            }
        
        }




}
?>