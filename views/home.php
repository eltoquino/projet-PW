<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Categories</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Liste des Categories</h1>
    <a href="AddCategorieController.php">Ajouter une catégorie</a>

    <?php if (count($categories) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Code</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $categorie): ?>
                    <tr>
                        <td><?php echo $categorie->getNom(); ?></td>
                        <td><?php echo $categorie->getCode(); ?></td>
                        <td>
                            <a href="ViewCategorieController.php?id=<?php echo $categorie->getId(); ?>">Voir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Aucune catégorie trouvée.</p>
    <?php endif; ?>
</body>
</html>

