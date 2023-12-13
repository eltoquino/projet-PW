<? ob_start() ?>

<h1>Détails de la catégorie</h1>
<a href="index.php?page=homecat">Retour à la liste des categories</a>

<?php if ($categorie) : ?>
    <p><strong>Nom :</strong> <?php echo $categorie->getNom(); ?></p>
    <p><strong>Code :</strong> <?php echo $categorie->getCode(); ?></p>
<?php else : ?>
    <p>La catégorie n'a pas été trouvé.</p>
<?php endif; ?>

<?php
$content = ob_get_clean();
require (getcwd()."/views/template.php");
?>