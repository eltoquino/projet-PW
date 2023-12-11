<? ob_start() ?>


<h1>Supprimer un Contact</h1>
    <a href="index.php?page=homecontact">Retour à la liste des contacts</a>

    <?php if ($contact): ?>
        <p>Voulez-vous vraiment supprimer la categorie "<?php echo $contact->getPrenom(); ?> <?php echo $contact->getNom(); ?>" ?</p>
        <form action="index.php?page=delete&action=deleteContact&id=<?php echo $contact->getId(); ?>" method="post">
            <input type="submit" value="Supprimer" class="btn btn-warning">
        </form>
    <?php else: ?>
        <p>Le contact n'a pas été trouvé.</p>
    <?php endif; ?>

<?php
$content = ob_get_clean();
require "template.php";
?>