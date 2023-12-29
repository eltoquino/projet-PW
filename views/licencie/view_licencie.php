<? ob_start() ?>

<h1>Détails du contact</h1>
<a href="index_licencie.php?page=homelicencie">Retour à la liste des licencies</a>

<?php if ($licencie) : ?>
    <p><strong>Numero licence :</strong> <?php echo $licencie->getNumeroLicence(); ?></p>
    <p><strong>Nom :</strong> <?php echo $licencie->getNom(); ?></p>
	<p><strong>Prenom :</strong> <?php echo $licencie->getPrenom(); ?></p>
    <p><strong>Nom contact :</strong> <?php echo $licencie->getNomContact(); ?></p>  
    <p><strong>Email contact :</strong> <?php echo $licencie->getEmailContact(); ?></p> 
    <p><strong>Telephone contact :</strong> <?php echo $licencie->getTelcontact(); ?></p> 
    <p><strong>Nom categorie :</strong> <?php echo $licencie->getNomcateg(); ?></p> 
<?php else : ?>
    <p>Le licencie n'a pas été trouvé.</p>
<?php endif; ?>

<?php
$content = ob_get_clean();
 
require (getcwd()."/views/template.php");
?>