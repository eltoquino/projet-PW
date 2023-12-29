<?php ob_start() ?>

<h1>Modifier un licencie</h1>
<a href="index.php?page=homecat">Retour à la liste des licenciés</a>

<?php if ($licencie) : ?>
    <form action="index_licencie.php?action=editLicencie&page=edit&id=<?php echo $licencie->getId(); ?>" method="post">
            <div class="form-group row">
                <input type="hidden" name="id" value="<?php echo $licencie->getId(); ?>">

            </div>
            <div class="form-group">
                <label for="nom">Numero licence :</label>
                <input type="text" class="form-control form-control-normal" id="numero" name="numero" value="<?php echo $licencie->getNumeroLicence(); ?>" required>
            </div>
            <div class="form-group">
                <label for="nom">Nom :</label>
                <input type="text" class="form-control form-control-normal" id="nom" name="nom" value="<?php echo $licencie->getNom(); ?>" required>
            </div>
            <div class="form-group">
                <label for="nom">Prenom :</label>
                <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo $licencie->getPrenom(); ?>" required>
            </div>

            <div class="form-group">
                <label for="nom">Contact :</label>

                <select id="contact_id" name="contact_id" class="form-control" aria-label="Default select example">
                    <?php foreach ($contacts as $contact): ?>
                        <option value="<?php echo $contact->getId(); ?>"><?php echo $contact->getLibelleContact(); ?></option>
                    <?php endforeach; ?>
                    
            </select>

            <div class="form-group">
                <label for="nom">Categorie :</label>

                <select id="categorie_id" name="categorie_id" class="form-control" aria-label="Default select example">
                    <?php foreach ($categories as $categorie): ?>
                        <option value="<?php echo $categorie->getId(); ?>"><?php echo $categorie->getNom(); ?></option>
                    <?php endforeach; ?>
                    
            </select>


            </div>


            <input type="submit" class="btn btn-success" value="Modifier" >
    </form>
<?php else : ?>
    <p>Le licencie n'a pas été trouvé.</p>
<?php endif; ?>
<?php
$content = ob_get_clean();
require (getcwd()."/views/template.php");
?>