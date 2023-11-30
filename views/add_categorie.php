<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une Categorie</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="https://bootswatch.com/5/litera/bootstrap.css">
</head>
<body>
    <h1>Ajouter une Categorie</h1>
    <a href="HomeController.php">Retour à la liste des categories</a>

    <form action="AddCategorieController.php" method="post">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required><br>

        <label for="code">Code :</label>
        <input type="text" id="code" name="code" required><br>

        <input type="submit" name="action" value="Ajouter">
    </form>
