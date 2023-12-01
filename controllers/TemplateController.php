<?php

class TemplateController
{
    public function index()
    {
        // Vous pouvez effectuer des opérations ici si nécessaire
        // par exemple, récupérer des données à afficher dans la vue

        // Charger la vue
        include('views/template.php');
    }
}

?>