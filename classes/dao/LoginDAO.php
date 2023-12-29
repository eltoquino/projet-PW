<?php

class LoginDAO
{

    private $pdo;

    public function __construct(PDO $pdo)
    {   
        $this->pdo = $pdo;
    }


    

    public function getConnexion($email,$motdepasse)
    {
        try {
          
            $query = "SELECT * FROM educateurs WHERE email = ? and mot_de_passe= ? and is_admin=1";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$email,$motdepasse]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
          
            return $row;

           // if ($row) {
             //   return new CategorieModel($row['id'], $row['nom'], $row['code']);
           // } else {
           //     return null;
           // }
        } catch (PDOException $e) {

            return null;
        }
    }


     


    
    
}
?>