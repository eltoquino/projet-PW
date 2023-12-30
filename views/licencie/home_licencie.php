<?php ob_start() ?>

<?php if (count($licencies) > 0) : ?>
    <a   class="ti-control-backward"  href="index.php?page=template">Retour</a>
    <div class="card">
    <div class="card-header">
        <h5>Liste des licencies</h5>
       
        

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
            <td class="border w-1/5 px-4 py-2 bold" >Numero licence </td>
            <td class="border w-1/5 px-4 py-2">Nom </td>
            <td class="border w-1/5 px-4 py-2">Prenom</td>
            <td class="border w-1/5 px-4 py-2">Contact</td>
            <td class="border w-1/5 px-4 py-2">EmailContact</td>
            <td class="border w-1/5 px-4 py-2">Tel. Contact</td>
            <td class="border w-1/5 px-4 py-2">Categorie</td>
			<!-- <td>Email </td>
            <td>Telephone</td> -->
            <td class="border w-1/5 px-4 py-2"> Action </td>
        </tr>
        <?php foreach ($licencies as $licencie) : ?>
            <tr>
               <td class="border px-4 py-2"><?php echo $licencie->getNumeroLicence(); ?></td>
                <td class="border px-4 py-2"><?php echo $licencie->getNom(); ?></td>
                <td class="border px-4 py-2"><?php echo $licencie->getPrenom(); ?></td>
                <td class="border px-4 py-2"><?php echo $licencie->getNomContact(); ?></td>
                <td class="border px-4 py-2"><?php echo $licencie->getEmailContact(); ?></td>
                <td class="border px-4 py-2"><?php echo $licencie->getTelContact(); ?></td> 
                <td class="border px-4 py-2"><?php echo $licencie->getNomcateg(); ?></td>
                <td class="border px-4 py-2">
                     
                    <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white" href="index.php?action=viewLicencie&page=viewlicencie&id=<?php echo $licencie->getId(); ?>">
                     <i class="fas fa-eye"></i></a>

                    <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white" href="index.php?page=editlicencie&action=editLicencie&id=<?php echo $licencie->getId(); ?>">
                    <i class="fas fa-edit"></i></a>

                    <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-red-500" href="index.php?page=deletelicencie&action=deleteLicencie&id=<?php echo $licencie->getId(); ?>">
                    <i class="fas fa-trash"></i></a>


                </td>
            </tr>
            </thead>
        <?php endforeach; ?>
    </table>
    </div>
    </div>
      </div>
    <a href="index.php?page=addlicencie" class="btn btn-success d-block">Ajouter</a>
<?php else : ?>
    <p>Aucun  contact trouvée.</p>
    <a href="index.php?page=addlicencie" class="btn btn-success d-block">Ajouter</a>
<?php endif; ?>


<?php
$content = ob_get_clean();
require (getcwd()."/views/template.php");

?>