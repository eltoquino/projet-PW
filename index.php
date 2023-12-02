<?php

require_once("config/config.php");
require_once("classes/models/CategorieModel.php");
require_once("classes/dao/CategorieDAO.php");
$categorieDAO=new CategorieDAO($pdo);



if (isset($_GET['page'])) {
$page = $_GET['page'];
} else {
$page = 'template'; 
}


if (isset($_GET['action'])) {
$action = $_GET['action'];
} 
else {
$action = 'index'; 
}
$controllers = [
'homecat' => 'HomeController',
'view' => 'ViewsCategorieController',
'add' => 'AddCategorieController',
'delete' => 'DeleteCategorieController',
'edit' => 'EditCategorieController',
'template' => 'TemplateController',
];


if (array_key_exists($page, $controllers)) {
$controllerName = $controllers[$page];

require_once('controllers/' . $controllerName . '.php');
$controller = new $controllerName($categorieDAO);

$controller->$action(isset($_GET['id'])?$_GET['id'] : null); 
} else {
echo "Page non trouvée";
} 
?>
