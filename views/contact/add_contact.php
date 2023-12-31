<? ob_start() ?>

<?php 

    if(!isset($_SESSION['email'])){
        header("Location:index.php?page=login");
    }
?>

<div class="card">
<a   class="ti-control-backward"  href="index.php?page=homecontact">Retour</a>
    <div class="card-header">
                                                                                <h5>Ajouter un contact</h5>

                                                                            </div>
                                                                            <div class="card-block">

    <form action="index.php?page=addcontact&action=addContact" method="post">

    <div class="form-group row">
               <label class="col-sm-2 col-form-label">Nom :</label>
             <div class="col-sm-10">
                <input type="text" class="form-control form-control-normal" id="nom" name="nom" required
                placeholder="nom du contact">
               </div>
        </div>
 
        <div class="form-group row">
               <label class="col-sm-2 col-form-label">Prenom :</label>
             <div class="col-sm-10">
                <input type="text" class="form-control form-control-normal" id="prenom" name="prenom" required
                placeholder="prenom du contact">
               </div>
        </div>
 
        <div class="form-group row">
               <label class="col-sm-2 col-form-label">Email :</label>
             <div class="col-sm-10">
                <input type="email" class="form-control form-control-normal" id="email" name="email"required
                placeholder="email du contact">
               </div>
        </div>
		
        <div class="form-group row">
               <label class="col-sm-2 col-form-label">Telephone :</label>
             <div class="col-sm-10">
                <input type="text" class="form-control form-control-normal" id="telephone" name="telephone" required
                placeholder="telephone du contact">
               </div>
        </div>
		 

        

        <input type="submit" class="btn btn-warning" name="action" value="Ajouter">
    </form>
    </div>
    </div>
<?php
$content = ob_get_clean();
require (getcwd()."/views/template.php");
?>