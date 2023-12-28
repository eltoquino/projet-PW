<? ob_start() ?>


<h1>Supprimer un Contact</h1>
    <a href="index.php?page=homecategorie">Retour à la liste des contacts</a>

    <?php if ($categorie): ?>
        <p>Voulez-vous vraiment supprimer la categorie "<?php echo $categorie->getNom(); ?> <?php echo $categorie->getCode(); ?>" ?</p>
        <form action="index.php?page=deletecategorie&action=deleteCategorie&id=<?php echo $categorie->getId(); ?>" method="post">
            <input type="submit" value="Supprimer" class="btn btn-warning">
        </form>
    <?php else: ?>
        <p>Le contact n'a pas été trouvé.</p>
    <?php endif; ?>

<?php
$content = ob_get_clean();
require (getcwd()."/views/template.php");
?>