<? ob_start() ?>


<div class="card">
<a   class="ti-control-backward"  href="index.php?page=template">Retour</a>
    <div class="card-header">
                                                                                <h5>Ajouter un licencie</h5>

                                                                            </div>
                                                                            <div class="card-block">
    <form action="index.php?page=addlicencie&action=addLicencie" method="post">

       
        <div class="form-group row">
               <label class="col-sm-2 col-form-label">Numero :</label>
             <div class="col-sm-10">
                <input type="text" class="form-control form-control-normal" id="numero" name="numero" required
                placeholder="Numero de licence">
               </div>
        </div>

        <div class="form-group row">
               <label class="col-sm-2 col-form-label">Nom :</label>
             <div class="col-sm-10">
                <input type="text" class="form-control form-control-normal" id="nom" name="nom" required
                placeholder="Nom du licencié">
               </div>
        </div>

        <div class="form-group row">
               <label class="col-sm-2 col-form-label">Prenom :</label>
             <div class="col-sm-10">
                <input type="text" class="form-control form-control-normal" id="prenom" name="prenom" required
                placeholder="Prénom du licencié">
               </div>
        </div>

        <div class="form-group row">
               <label class="col-sm-2 col-form-label">Contact :</label>
             <div class="col-sm-10">
             <select id="contact_id" name="contact_id" class="form-control" aria-label="Default select example">
                    <?php foreach ($contacts as $contact): ?>
                        <option value="<?php echo $contact->getId(); ?>"><?php echo $contact->getLibelleContact(); ?></option>
                    <?php endforeach; ?>
                    
            </select>
               </div>
        </div>


        <div class="form-group row">
               <label class="col-sm-2 col-form-label">categorie :</label>
             <div class="col-sm-10">
             <select id="categorie_id" name="categorie_id" class="form-control" aria-label="Default select example">
                    <?php foreach ($categories as $cat): ?>
                        <option value="<?php echo $cat->getId(); ?>"><?php echo $cat->getNom(); ?></option>
                    <?php endforeach; ?>
                    
                </select>
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