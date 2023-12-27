<?php ob_start() ?>

<h1>Modifier un contact</h1>
<a href="index_contact.php?page=homecontact">Retour à la liste des contacts</a>

<?php if ($contact) : ?>
    <form action="index_contact.php?action=editContact&page=edit&id=<?php echo $contact->getId(); ?>" method="post">
            <div class="form-group row">
                <input type="hidden" name="id" value="<?php echo $contact->getId(); ?>">

            </div>
            <div class="form-group">
                <label for="nom">Nom :</label>
                <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $contact->getNom(); ?>" required>
            </div>
            <div class="form-group">
                <label for="nom">Prenom :</label>
                <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo $contact->getPrenom(); ?>" required>
            </div>

            <div class="form-group">
                <label for="nom">Email :</label>
                <input type="text" type="email"  class="form-control" id="email" name="email" value="<?php echo $contact->getEmail(); ?>" required>
            </div>
            <div class="form-group">
                <label for="nom">Telephone :</label>
                <input type="text" class="form-control" id="numero_tel" name="numero_tel" value="<?php echo $contact->getTelephone(); ?>" required>
            </div>


            <input type="submit" class="btn btn-success" value="Modifier" >
    </form>
<?php else : ?>
    <p>La catégorie n'a pas été trouvée.</p>
<?php endif; ?>
<?php
$content = ob_get_clean();
require (getcwd()."/views/template.php");
?>