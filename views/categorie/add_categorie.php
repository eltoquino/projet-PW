<? ob_start() ?>


<div class="card">
<a   class="ti-control-backward"  href="index.php?page=template">Retour</a>
    <div class="card-header">
                                                                                <h5>Ajouter une Categorie</h5>

                                                                            </div>
                                                                            <div class="card-block">
    <form action="index.php?page=add&action=addCategorie" method="post">

       
        <div class="form-group row">
               <label class="col-sm-2 col-form-label">Nom :</label>
             <div class="col-sm-10">
                <input type="text" class="form-control form-control-normal" id="nom" name="nom" required
                placeholder="nom de la categorie">
               </div>
        </div>

        <div class="form-group row">
               <label class="col-sm-2 col-form-label">Code :</label>
             <div class="col-sm-10">
                <input type="text" class="form-control form-control-normal" id="code" name="code" required
                placeholder="code de la categorie">
               </div>
        </div>

 
        <input type="submit" class="btn btn-success d-block" name="action" value="Ajouter">
    </form>
    </div>
    </div>
<?php
$content = ob_get_clean();
require (getcwd()."/views/template.php");
?>