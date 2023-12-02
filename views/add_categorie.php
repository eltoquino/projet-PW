<? ob_start() ?>

<h1>Ajouter une Categorie</h1>
    <a href="index.php?page=homecat">Retour à la liste des categories</a>

    <form action="index.php?page=add&action=addCategorie" method="post">

        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required><br>

        <label for="code">Code :</label>
        <input type="text" id="code" name="code" required><br>

        <input type="submit" class="btn btn-warning" name="action" value="Ajouter">
    </form>

<?php
$content = ob_get_clean();
require "template.php";
?>