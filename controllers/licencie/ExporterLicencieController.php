<?php

class ExporterLicencieController
{
    private $categorieDAO;
    private $licencieDAO;
    private $contactDAO;
    private $educateurDAO; 
    private  $loginDAO;

    public function __construct($categorieDAO,$licencieDAO,$contactDAO,$educateurDAO,$loginDAO)
    {
        $this->licencieDAO = $licencieDAO;
    }

    public function exporterLicencie()
    {
        // Récupérer la liste de toutes les licencies depuis le modèle
        $licencies = $this->licencieDAO->getAll();

       // lc.id,lc.numero_licence,lc.nom,lc.prenom,lc.contact_id,lc.categorie_id,
         //   ct.nom nomcontact,ct.prenom prenomcontact,ct.email emailcontact,ct.numero_tel telcontact,
           // categ.nom nomcateg,categ.code codecateg



        //$newReservations = $select->fetchAll();
       //var_dump($licencies);
       //die();

$excel = "";
$excel .=  "Id\tnumero_licence\tNom\tPrénom\tidcontact\tidcategorie\tnomcontact\tprenomcontact\temailcontact\ttelcontact\tNomCategorie\tCodeCategorie\n";
 
foreach($licencies as $row) {
   // var_dump($row);
   // var_dump($row->getId());
   //  $excel .= "$row[id]\t$row[numero_licence]\t$row[nom]\t$row[prenom]\t$row[contact_id]\t$row[categorie_id]\t$row[nomcontact]\t$row[prenomcontact]\t$row[emailcontact]\t$row[telcontact]\t$row[nomcateg]\t$row[codecateg]\n";
    $excel .= $row->getId()."\t".$row->getNumeroLicence()."\t".$row->getNom()."\t".$row->getPrenom()."\t".$row->getContactId()."\t".$row->getCategorieId()."\t".$row->getNomDetContact()."\t".$row->getPrenomDetContact()."\t".$row->getEmailContact()."\t".$row->getTelcontact()."\t".$row->getNomcateg()."\t".$row->getCodecateg()."\n";
    // var_dump($excel);
}
 //die();
 header("Content-type: application/vnd.ms-excel");
 header("Content-disposition: attachment; filename=export_liste_licencie.xls");

print $excel;
exit;

      //  var_dump( $licencies );
       // die();

        // var_dump($licencies);
        //die();

        // Inclure la vue pour afficher la liste des licencies
       // include('views/licencie/home_licencie.php');
    }

    
    





}

?>