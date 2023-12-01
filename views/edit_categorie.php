<?php ob_start() ?>

<h1>Modifier une Catégorie</h1>
<a href="index.php?page=home">Retour à la liste des catégories</a>

<?php if ($categorie) : ?>
    <form action="index.php?action=editCategorie&page=edit&id=<?php echo $categorie->getId(); ?>" method="post">
            <div class="form-group row">
                <input type="hidden" name="id" value="<?php echo $categorie->getId(); ?>">

            </div>
            <div class="form-group">
                <label for="nom">Nom :</label>
                <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $categorie->getNom(); ?>" required>
            </div>
            <div class="form-group">
                <label for="nom">Code :</label>
                <input type="text" class="form-control" id="code" name="code" value="<?php echo $categorie->getCode(); ?>" required>
            </div>
            <input type="submit" class="btn btn-success" value="Modifier" >
    </form>
<?php else : ?>
    <p>La catégorie n'a pas été trouvée.</p>
<?php endif; ?>
<?php
$content = ob_get_clean();
require "template.php";
?>