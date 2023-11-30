<?php

class CategorieDAO
{

    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }


    public function create(CategorieModel $categorie)
    {
        try {

            $stmt = $this->pdo->prepare("INSERT INTO Categories (nom, code) VALUES (?, ?)");
            $stmt->execute([$categorie->getNom(), $categorie->getCode()]);
            return true;
        } catch (PDOException $e) {

            return false;
        }
    }


    public function getById($id)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM Categories WHERE id = ?");
            $stmt->execute([$id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                return new CategorieModel($row['id'], $row['nom'], $row['code']);
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
            $stmt = $this->pdo->query("SELECT * FROM Categories");
            $categorie = [];

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $categorie[] = new CategorieModel($row['id'], $row['nom'], $row['code']);
            }

            return $categorie;
        } catch (PDOException $e) {

            return [];
        }
    }


    public function update(CategorieModel $categorie)
    {
        try {
            $stmt = $this->pdo->prepare("UPDATE Categories SET nom = ?, code = ? WHERE id = ?");
            $stmt->execute([$categorie->getNom(), $categorie->getCode(), $categorie->getId()]);
            return true;
        } catch (PDOException $e) {

            return false;
        }
    }


    public function deleteById($id)
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM Categories WHERE id = ?");
            $stmt->execute([$id]);
            return true;
        } catch (PDOException $e) {

            return false;
        }
    }
}
?>