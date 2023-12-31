<?php
session_start();
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


    
public function getAdmin() {
    if(isset($_SESSION['email'])){
        $a = [
            'email'     => $_SESSION['email'],
            'role'  =>  1,
            
        ];
        try {
            $sql = "SELECT * FROM educateur WHERE email = :email AND role= :role";  
            $stmt = $this->connexion->pdo->prepare($sql);
            $stmt->execute($a);
            //$educateur = [];

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
            //$exist = $stmt->rowCount($sql);
            
            
            return $row;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de rÃ©cupÃ©ration ici
            return [];
        }
    } else{
        return 0;
    }
}





     


    
    
}
?>