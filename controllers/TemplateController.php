<?php

class TemplateController
{
    public function index()
    {
        $content='';
        // Charger la vue
        include('views/template.php');
    }
}

?>