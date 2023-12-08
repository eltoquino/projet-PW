<? ob_start() ?>

<h1>Détails de la catégorie</h1>
<a href="index_contact.php?page=homecontact">Retour à la liste des contacts</a>

<?php if ($contact) : ?>
    <p><strong>Nom :</strong> <?php echo $contact->getNom(); ?></p>
    <p><strong>Prenom :</strong> <?php echo $contact->getPrenom(); ?></p>
	<p><strong>Email :</strong> <?php echo $contact->getEmail(); ?></p>
    <p><strong>Telephone :</strong> <?php echo $contact->getTelephone(); ?></p> 
<?php else : ?>
    <p>Le contact n'a pas été trouvé.</p>
<?php endif; ?>

<?php
$content = ob_get_clean();
 
require (getcwd()."/views/template.php");
?>