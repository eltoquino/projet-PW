<?php ob_start() ?>

<?php 

    if(!isset($_SESSION['email'])){
        header("Location:index.php?page=login");
    }
?>




<form  enctype="multipart/form-data" action="index.php?page=traiterimportationlicencie&action=importLicencie" method="post">


        <div class="input-row">
            <label class="col-md-4 control-label">Choisir un fichier CSV</label>
            <input type="file" name="file" id="file" accept=".csv">
            <br />
            <br />
            <button type="submit" id="import" name="import" class="btn-submit">Import</button>
            <br />
        </div>
    </form>

<?php
$content = ob_get_clean();
require (getcwd()."/views/template.php");

?>