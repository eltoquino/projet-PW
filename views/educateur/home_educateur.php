<?php ob_start() ?>


<?php 

    if(!isset($_SESSION['email'])){
        header("Location:index.php?page=login");
    }
?>

<?php if (count($educateurs) > 0) : ?>
    <a   class="ti-control-backward"  href="index.php?page=template">Retour</a>
    <div class="card">
    <div class="card-header">
        <h5>Liste des educateurs</h5>

       

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
            <td class="border w-1/4 px-4 py-2">Numero licence </td>
            <td class="border w-1/5 px-4 py-2">Nom </td> 
            <td class="border w-1/5 px-4 py-2">Email </td>
            <td class="border w-1/5 px-4 py-2">Mot de passe</td>
            <td class="border w-1/5 px-4 py-2">est Admin</td>
			<!-- <td>Email </td>
            <td>Telephone</td> -->
            <td class="border w-1/5 px-4 py-2"> Action </td>
        </tr>
        <?php foreach ($educateurs as $educateur) : ?>
            <tr>
               <td class="border px-4 py-2"><?php echo $educateur->getNumeroLicence(); ?></td>
                <td class="border px-4 py-2"><?php echo $educateur->getNomLicencie(); ?></td> 
                <td class="border px-4 py-2"><?php echo $educateur->getEmail(); ?></td>
                <td class="border px-4 py-2"><?php echo $educateur->getMotDePasse(); ?></td> 
                <td class="border px-4 py-2"><?php echo $educateur->getIsAdmin(); ?></td>
                <td class="border px-4 py-2"> 
                     
                    <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white" href="index.php?action=viewEducateur&page=view&id=<?php echo $educateur->getId(); ?>">
                     <i class="fas fa-eye"></i></a>

                    <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white" href="index.php?page=editeducateur&action=editEducateur&id=<?php echo $educateur->getId(); ?>">
                    <i class="fas fa-edit"></i></a>

                    <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-red-500" href="index.php?page=deleteeducateur&action=deleteEducateur&id=<?php echo $educateur->getId(); ?>">
                    <i class="fas fa-trash"></i></a>


                </td>
            </tr>
            </thead>
        <?php endforeach; ?>
    </table>
    </div>
    </div>
      </div>
    <a href="index.php?page=addeducateur" class="btn btn-success d-block">Ajouter</a>
<?php else : ?>
    <p>Aucun  educateur trouvée.</p>
    <a href="index.php?page=addeducateur" class="btn btn-success d-block">Ajouter</a>
<?php endif; ?>


<?php
$content = ob_get_clean();
require (getcwd()."/views/template.php");

?>