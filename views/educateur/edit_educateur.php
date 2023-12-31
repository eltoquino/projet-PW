<?php ob_start() ?>

<?php 

    if(!isset($_SESSION['email'])){
        header("Location:index.php?page=login");
    }
?>

<h1>Modifier un educateur</h1>
<a href="index.php?page=homeeducateur">Retour à la liste des contacts</a>

<?php if ($educateur) : ?>
    <form action="index.php?action=editEducateur&page=editeducateur&id=<?php echo $educateur->getId(); ?>" method="post">
            <div class="form-group row">
                <input type="hidden" name="id" value="<?php echo $educateur->getId(); ?>">

            </div>

            <div class="form-group">
                <label for="nom">Licencie :</label>

                <select id="licencie_id" name="licencie_id" class="form-control" aria-label="Default select example">
                    <?php foreach ($licencies as $licencie): ?>
                        <option value="<?php echo $licencie->getId(); ?>"><?php echo $licencie->getNomLicencie(); ?></option>
                    <?php endforeach; ?>
                    
            </select>


            <div class="form-group">
                <label for="nom">Email :</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $educateur->getEmail(); ?>" required>
            </div>
             

             

            <input type="submit" class="btn btn-success" value="Modifier" >
    </form>
<?php else : ?>
    <p>educateur  n'a pas été trouvée.</p>
<?php endif; ?>
<?php
$content = ob_get_clean();
require (getcwd()."/views/template.php");
?>