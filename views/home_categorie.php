<?php ob_start() ?>

<?php if (count($categories) > 0) : ?>
    <a href="index.php?page=template">Retour au menu principale</a>
    <h1>Toutes les catégories</h1>

    <table class="table text-center">
        <tr class="table-dark">
            <td> Nom </td>
            <td>Code</td>
            <td colspan="2"> Action </td>
        </tr>
        <?php foreach ($categories as $categorie) : ?>
            <tr>
                <td><?php echo $categorie->getNom(); ?></td>
                <td><?php echo $categorie->getCode(); ?></td>
                <td>
                    <a class="btn btn-info" href="index.php?action=viewCategorie&page=view&id=<?php echo $categorie->getId(); ?>"> Voir </a>
                    <a class="btn btn-warning" href="index.php?page=edit&action=editCategorie&id=<?php echo $categorie->getId(); ?>">Modifier</a>
                    <a class="btn btn-danger" href="index.php?page=delete&action=deleteCategorie&id=<?php echo $categorie->getId(); ?>">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="index.php?page=add" class="btn btn-success d-block">Ajouter</a>
<?php else : ?>
    <p>Aucune catégorie trouvée.</p>
    <a href="index.php?page=add" class="btn btn-success d-block">Ajouter</a>
<?php endif; ?>


<?php
$content = ob_get_clean();
require "template.php";
?>