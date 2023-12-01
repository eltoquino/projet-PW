<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Supprimer une Catégorie</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
    <h1>Supprimer une Catégorie</h1>

    <?php if (isset($message)): ?>
        <p><?php echo $message; ?></p>
    <?php else: ?>
        <p>Êtes-vous sûr de vouloir supprimer cette catégorie ?</p>
        <form action="DeleteCategorieController.php" method="get">
            <input type="hidden" name="id" value="<?php echo $categorieId; ?>">
            <input type="submit" value="Oui, Supprimer">
        </form>
        <a href="HomeController.php">Non, Annuler</a>
    <?php endif; ?>
</body>
</html>