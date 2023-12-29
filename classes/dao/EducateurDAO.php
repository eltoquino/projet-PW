<?php

class EducateurDAO
{

    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }


    public function create(EducateurModel $educateur)
    {
        try {
            $query ="INSERT INTO educateurs (id, email,mot_de_passe,is_admin) VALUES (?, ?, ?, ?)";
          
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$educateur->getId(), $educateur->getEmail(),$educateur->getMotDePasse() , $educateur->getIsAdmin()]);
            
            return true;
        } catch (PDOException $e) {
            var_dump($e);
            die();

            return false;
        }
    }
 

    public function getById($id)
    {
        try { 
            $query = "select educ.id ,educ.email,educ.mot_de_passe,educ.is_admin,lc.nom,lc.prenom,
            lc.numero_licence
            from educateurs educ join licencies lc on educ.id=lc.id
            WHERE id = ?";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                return new EducateurModel($row['id'], $row['email'], $row['mot_de_passe'],$row['is_admin'],$row['nom'],
                $row['prenom'],$row['numero_licence']);
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
            $query = "select educ.id ,educ.email,educ.mot_de_passe,educ.is_admin,lc.nom,lc.prenom,
            lc.numero_licence
            from educateurs educ join licencies lc on educ.id=lc.id";
            $stmt = $this->pdo->query($query);
            $educateur = [];

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $educateur[] = new EducateurModel($row['id'], $row['email'], $row['mot_de_passe'],$row['is_admin'],
                $row['nom'],$row['prenom'],$row['numero_licence']);
            }

            return $educateur;
        } catch (PDOException $e) {

            return [];
        }
    }


    public function update(EducateurModel $educateur)
    {
        try {
            $query = "UPDATE educateurs SET email = ?, mot_de_passe = ?,is_admin = ? WHERE id = ?";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$educateur->getEmail(), $educateur->getMotDePasse(), $educateur->getIsAdmin(),$educateur->getId()]);
            return true;
        } catch (PDOException $e) {

            return false;
        }
    }


    public function deleteById($id)
    {
        try {
            $query = "DELETE FROM educateurs WHERE id = ?";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$id]);
            return true;
        } catch (PDOException $e) {

            return false;
        }
    }
}
?>