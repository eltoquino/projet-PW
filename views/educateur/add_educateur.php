<? ob_start() ?>


<div class="card">
<a   class="ti-control-backward"  href="index.php?page=template">Retour</a>
    <div class="card-header">
                                                                                <h5>Ajouter un educateur</h5>

                                                                            </div>
                                                                            <div class="card-block">
    <form action="index_educateur.php?page=add&action=addEducateur" method="post">

    <div class="form-group row">
               <label class="col-sm-2 col-form-label">Licencié :</label>
             <div class="col-sm-10">
             <select id="licencie_id" name="licencie_id" class="form-control" aria-label="Default select example">
                    <?php foreach ($licencies as $licencie): ?>
                        <option value="<?php echo $licencie->getId(); ?>"><?php echo $licencie->getNomLicencie(); ?></option>
                    <?php endforeach; ?>
                    
            </select>
               </div>
        </div>
       
        <div class="form-group row">
               <label class="col-sm-2 col-form-label">Email :</label>
             <div class="col-sm-10">
                <input type="text" class="form-control form-control-normal" id="email" name="email" required
                placeholder="Email">
               </div>
        </div>

        <div class="form-group row">
               <label class="col-sm-2 col-form-label">Mot de passe :</label>
             <div class="col-sm-10">
                <input type="password" class="form-control form-control-normal" id="password" name="password" required
                placeholder="Mot de passe">
               </div>
        </div>

        <div class="form-group row">
               <label class="col-sm-2 col-form-label">Est admin :</label>
             <div class="col-sm-1">
                <input type="checkbox" class="form-control form-control-normal" id="isAdmin" name="isAdmin" >
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