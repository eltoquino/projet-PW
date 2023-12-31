<?php ob_start() ?>

<?php 

    if(!isset($_SESSION['email'])){
        header("Location:index.php?page=login");
    }
?>

<?php if (count($contacts) > 0) : ?>
    <a   class="ti-control-backward"  href="index.php?page=template">Retour</a>
    <div class="card">
    <div class="card-header">
        <h5>Liste des contacts</h5>
       
          <div class="card-header-right">
          <ul class="list-unstyled card-option">
           <li><i class="fa fa fa-wrench open-card-option"></i></li>
            <li><i class="fa fa-window-maximize full-card"></i></li>
             <li><i class="fa fa-minus minimize-card"></i></li>
             <li><i class="fa fa-refresh reload-card"></i></li>
         <li><i class="fa fa-trash close-card"></i></li>
           </ul>
           </div>
         </div>                    
    <div class="card-block table-border-style">
    <div class="table-responsive">
    <table class="table">
    <thead>
        <tr>
            <td>Nom </td>
            <td>Prenom</td>
			<td>Email </td>
            <td>Telephone</td>
            <td class="border w-1/5 px-4 py-2"> Action </td>
        </tr>
        <?php foreach ($contacts as $contact) : ?>
            <tr>
                <td><?php echo $contact->getNom(); ?></td>
                <td><?php echo $contact->getPrenom(); ?></td>
				<td><?php echo $contact->getEmail(); ?></td>
                <td><?php echo $contact->getTelephone(); ?></td>
                <td class="border px-4 py-2">
                     
                    <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white" href="index.php?action=viewContact&page=viewcontact&id=<?php echo $contact->getId(); ?>">
                     <i class="fas fa-eye"></i></a>

                    <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white" href="index.php?page=editcontact&action=editContact&id=<?php echo $contact->getId(); ?>">
                    <i class="fas fa-edit"></i></a>

                    <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-red-500" href="index.php?page=deletecontact&action=deleteContact&id=<?php echo $contact->getId(); ?>">
                    <i class="fas fa-trash"></i>


                </td>
            </tr>
            </thead>
        <?php endforeach; ?>
    </table>
    </div>
    </div>
      </div>
    <a href="index.php?page=addcontact" class="btn btn-success d-block">Ajouter</a>
<?php else : ?>
    <p>Aucun  contact trouvée.</p>
    <a href="index.php?page=addcontact" class="btn btn-success d-block">Ajouter</a>
<?php endif; ?>


<?php

$content = ob_get_clean();
require (getcwd()."/views/template.php");

?>