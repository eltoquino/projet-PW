<?php ob_start() ?>

<?php if (count($contacts) > 0) : ?>
    <a href="index.php?page=template">Retour au menu principale</a>
    <h1>Tous les contacts</h1>

    <table class="table text-center">
        <tr class="table-dark">
            <td> Nom </td>
            <td>Prenom</td>
			<td> Email </td>
            <td>Telephone</td>
            <td colspan="2"> Action </td>
        </tr>
        <?php foreach ($contacts as $contact) : ?>
            <tr>
                <td><?php echo $contact->getNom(); ?></td>
                <td><?php echo $contact->getPrenom(); ?></td>
				<td><?php echo $contact->getEmail(); ?></td>
                <td><?php echo $contact->getTelephone(); ?></td>
                <td>
                    <a class="btn btn-info" href="index_contact.php?action=viewContact&page=view&id=<?php echo $contact->getId(); ?>"> Voir </a>
                    <a class="btn btn-warning" href="index_contact.php?page=edit&action=editContact&id=<?php echo $contact->getId(); ?>">Modifier</a>
                    <a class="btn btn-danger" href="index_contact.php?page=delete&action=deleteContact&id=<?php echo $contact->getId(); ?>">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="index_contact.php?page=add" class="btn btn-success d-block">Ajouter</a>
<?php else : ?>
    <p>Aucun  contact trouvée.</p>
    <a href="index_contact.php?page=add" class="btn btn-success d-block">Ajouter</a>
<?php endif; ?>


<?php
$content = ob_get_clean();
require (getcwd()."/views/template.php");

?>