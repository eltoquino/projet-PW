<? ob_start() ?>

<?php 

    if(!isset($_SESSION['email'])){
        header("Location:index.php?page=login");
    }
?>
<h1>Supprimer un Contact</h1>
    <a href="index.php?page=homeeducateur">Retour à la liste des educateurs</a>

    <?php if ($educateur): ?>
        <p>Voulez-vous vraiment supprimer cet educateur "<?php echo $educateur->getNomLicencie(); ?> <?php echo $educateur->getNumeroLicence(); ?>" ?</p>
        <form action="index.php?page=deleteeducateur&action=deleteeducateur&id=<?php echo $educateur->getId(); ?>" method="post">
            <input type="submit" value="Supprimer" class="btn btn-warning">
        </form>
    <?php else: ?>
        <p>Le licencie n'a pas été trouvé.</p>
    <?php endif; ?>

<?php
$content = ob_get_clean();
require (getcwd()."/views/template.php");
?>