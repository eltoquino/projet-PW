<? ob_start() ?>

<?php 

    if(!isset($_SESSION['email'])){
        header("Location:index.php?page=login");
    }
?>
<h1>Supprimer un Contact</h1>
    <a href="index.php?page=homelicencie">Retour à la liste des licencies</a>

    <?php if ($licencie): ?>
        <p>Voulez-vous vraiment supprimer ce licencie "<?php echo $licencie->getNom(); ?> <?php echo $licencie->getPrenom(); ?>" ?</p>
        <form action="index.php?page=deletelicencie&action=deletelicencie&id=<?php echo $licencie->getId(); ?>" method="post">
            <input type="submit" value="Supprimer" class="btn btn-warning">
        </form>
    <?php else: ?>
        <p>Le licencie n'a pas été trouvé.</p>
    <?php endif; ?>

<?php
$content = ob_get_clean();
require (getcwd()."/views/template.php");
?>