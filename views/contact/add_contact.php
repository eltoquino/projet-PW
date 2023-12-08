<? ob_start() ?>

<h1>Ajouter un Contact</h1>
    <a href="index_contact.php?page=homecontact">Retour à la liste des contacts</a>

    <form action="index_contact.php?page=add&action=addContact" method="post">

        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required><br>

        <label for="code">Prenom :</label>
        <input type="text" id="prenom" name="prenom" required><br>
		
		 <label for="nom">Email :</label>
        <input type="text" id="email" name="email" required><br>

        <label for="code">Telephone :</label>
        <input type="text" id="telephone" name="telephone" required><br>

        <input type="submit" class="btn btn-warning" name="action" value="Ajouter">
    </form>

<?php
$content = ob_get_clean();
require (getcwd()."/views/template.php");
?>