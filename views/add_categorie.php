<?php ob_start() ?>

<h1>Ajouter une Categorie</h1>
<a href="HomeController.php">Retour à la liste des categories</a>

<form action="AddCategorieController.php" method="post">
            <div class="form-group">
                <label for="nom">Nom :</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>
            <div class="form-group">
                <label for="code">Code :</label>
                <input type="text" class="form-control" id="code" name="code"required>
            </div>
            <input type="submit" name="action" class="btn btn-success" value="Ajouter" >
    </form>
<?php
$content = ob_get_clean();
require "template.php";
?>