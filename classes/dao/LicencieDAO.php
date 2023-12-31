<?php
class LicencieDAO
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
 
    public function create(LicencieModel $licencie)
    {
        try {
          
            $query = "INSERT INTO Licencies (numero_licence, nom, prenom, contact_id, categorie_id) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$licencie->getNumeroLicence(), $licencie->getNom(), $licencie->getPrenom(), $licencie->getContactId(), $licencie->getCategorieId()
           ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getById($id)
    {
        try {
            $query = "SELECT lc.id,lc.numero_licence,lc.nom,lc.prenom,lc.contact_id,lc.categorie_id,
            ct.nom nomcontact,ct.prenom prenomcontact,ct.email emailcontact,ct.numero_tel telcontact,
            categ.nom nomcateg,categ.code codecateg
            FROM licencies lc  join contacts ct on lc.contact_id=ct.id  join categories categ on lc.categorie_id=categ.id
             WHERE lc.id = ?";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                return new LicencieModel($row['id'],$row['numero_licence'], $row['nom'], $row['prenom'], $row['contact_id'], $row['categorie_id'],
                $row['nomcontact'],$row['prenomcontact'], $row['emailcontact'], $row['telcontact'], $row['nomcateg'], $row['codecateg']);
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
            $query = "SELECT lc.id,lc.numero_licence,lc.nom,lc.prenom,lc.contact_id,lc.categorie_id,
            ct.nom nomcontact,ct.prenom prenomcontact,ct.email emailcontact,ct.numero_tel telcontact,
            categ.nom nomcateg,categ.code codecateg
            FROM licencies lc  join contacts ct on lc.contact_id=ct.id  join categories categ on lc.categorie_id=categ.id";
            $stmt = $this->pdo->query($query);
            $licencies = [];

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $licencies[] = new LicencieModel($row['id'],$row['numero_licence'], $row['nom'], $row['prenom'], $row['contact_id'], $row['categorie_id'],
                $row['nomcontact'],$row['prenomcontact'], $row['emailcontact'], $row['telcontact'], $row['nomcateg'], $row['codecateg']);
            }

            return $licencies;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function update(LicencieModel $licencie)
    {
        try {
            $query = "UPDATE Licencies SET numero_licence = ?, nom = ?, prenom = ?, contact_id = ?, categorie_id = ? WHERE id = ?";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$licencie->getNumeroLicence(), $licencie->getNom(), $licencie->getPrenom(), $licencie->getContactId(), $licencie->getCategorieId(), $licencie->getId()]);
            return true;
        } catch (PDOException $e) {

            
            return false;

        }
    }

    public function deleteById($id)
    {
        try {
            $query = "DELETE FROM Licencies WHERE id = ?";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$id]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function deleteByContactId($id)
    {
        try {
            $query = "DELETE FROM Licencies WHERE contact_id = ?";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$id]);
            return true;
        } catch (PDOException $e) {
            var_dump($e);
            die();
            return false;
        }
    }

    public function getByContactId($id)
    {
        try {
            $query = "SELECT lc.id,lc.numero_licence,lc.nom,lc.prenom,lc.contact_id,lc.categorie_id,
            ct.nom nomcontact,ct.prenom prenomcontact,ct.email emailcontact,ct.numero_tel telcontact,
            categ.nom nomcateg,categ.code codecateg
            FROM licencies lc  join contacts ct on lc.contact_id=ct.id  join categories categ on lc.categorie_id=categ.id
             WHERE lc.contact_id = ?";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                return new LicencieModel($row['id'],$row['numero_licence'], $row['nom'], $row['prenom'], $row['contact_id'], $row['categorie_id'],
                $row['nomcontact'],$row['prenomcontact'], $row['emailcontact'], $row['telcontact'], $row['nomcateg'], $row['codecateg']);
            } else {
                return null;
            }
        } catch (PDOException $e) {
            return null;
        }
    }





}
?>