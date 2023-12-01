<?php
// Inclure le fichier de configuration
require_once("config/config.php");
require_once("classes/models/CategorieModel.php");
require_once("classes/dao/CategorieDAO.php");
$categorieDAO=new CategorieDAO($pdo);


// Exemple de routage basique
if (isset($_GET['page'])) {
$page = $_GET['page'];
} else {
$page = 'template'; // Page par d�faut
}


// Exemple avec un parametre pour permettre un routage plus sophistiqu�
if (isset($_GET['action'])) {
$action = $_GET['action'];
} else {
$action = 'index'; // Page par d�faut
}

// D�finir les contr�leurs disponibles
$controllers = [
'home' => 'HomeController',
'add' => 'AddCategorieController',
'delete' => 'DeleteCategorieController',
'edit' => 'EditCategorieController',
'template' => 'TemplateController'

];
// V�rifier si le contr�leur demand� existe
if (array_key_exists($page, $controllers)) {
$controllerName = $controllers[$page];
// Inclure le fichier du contr�leur
require_once('controllers/' . $controllerName . '.php');
$controller = new $controllerName($categorieDAO);
// Ex�cuter la m�thode par d�faut du contr�leur (par exemple, index() ou home())
$controller->$action(isset($_GET['id'])?$_GET['id'] : null); // Vous pouvez ajuster la m�thode par d�faut selon votre convention
//c'est l'interet de action qui permet d'appeler une m�thode particuliere d'un controller si il en possede plusieurs
//ici isset($_GET['id'])?$_GET['id']:null est une ternaire(un if else condens�) pour passer la variable � la fonction si elle existe
} else {
// Page non trouv�e, vous redirigerez vers une page d'erreur 404
echo "Page non trouvée";
} 
?>
