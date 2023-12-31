<?php ob_start() ?>

<?php 

    if(!isset($_SESSION['email'])){
        header("Location:index.php?page=login");
    }
?>

<?php if (count($categories) > 0) : ?>
    <a   class="ti-control-backward"  href="index.php?page=template">Retour</a>
     
    <div class="card">
    <div class="card-header">
        <h5>Liste des categories</h5>
       
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
        <td class="border">Nom</td>
        <td class="border">Code</td>
        <td class="border w-1/5 px-4 py-2">Actions</td>
        </tr>
        <?php foreach ($categories as $categorie) : ?>
            <tr>
                <td class="border"><?php echo $categorie->getNom(); ?></td>
                <td class="border"><?php echo $categorie->getCode(); ?></td>
                 <td class="border px-4 py-2">
                   <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white" href="index.php?action=viewCategorie&page=viewcategorie&id=<?php echo $categorie->getId(); ?>">
                     <i class="fas fa-eye"></i></a>
                    <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white" href="index.php?page=editcategorie&action=editCategorie&id=<?php echo $categorie->getId(); ?>">
                    <i class="fas fa-edit"></i></a>
                    <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-red-500" href="index.php?page=deletecategorie&action=deleteCategorie&id=<?php echo $categorie->getId(); ?>">
                    <i class="fas fa-trash"></i>
                    </a>
                    </td>
           </tr>
            </thead>
        <?php endforeach; ?>
    </table>
    </div>
    </div>
      </div>
    <a href="index.php?page=addcategorie" class="btn btn-success d-block">Ajouter</a>
<?php else : ?>
    <p>Aucune catégorie trouvée.</p>
    <a href="index.php?page=addcategorie" class="btn btn-success d-block">Ajouter</a>
<?php endif; ?>


<?php
$content = ob_get_clean();
require (getcwd()."/views/template.php");
?>