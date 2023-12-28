<?php

require_once("config/config.php");
require_once("classes/models/CategorieModel.php");
require_once("classes/dao/CategorieDAO.php");
$categorieDAO=new CategorieDAO($pdo);

require_once("classes/models/ContactModel.php");
require_once("classes/dao/ContactDAO.php");
$contactDAO=new ContactDAO($pdo);


require_once("classes/models/LicencieModel.php");
require_once("classes/dao/LicencieDAO.php");
$licencieDAO=new LicencieDAO($pdo);

require_once("classes/models/EducateurModel.php");
require_once("classes/dao/EducateurDAO.php");
$educateurDAO=new EducateurDAO($pdo);


require_once("classes/dao/LoginDAO.php");
$loginDAO=new LoginDAO($pdo);


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
'homecategorie' => 'HomeCategorieController',
'viewcategorie' => 'ViewsCategorieController',
'addcategorie' => 'AddCategorieController',
'deletecategorie' => 'DeleteCategorieController',
'editcategorie' => 'EditCategorieController',

 
'homecontact' => 'HomeContactController',
'viewcontact' => 'ViewsContactController',
'addcontact' => 'AddContactController',
'deletecontact' => 'DeleteContactController',
'editcontact' => 'EditContactController',

'homelicencie' => 'HomeLicencieController',
'viewlicencie' => 'ViewsLicencieController',
'addlicencie' => 'AddLicencieController',
'deletelicencie' => 'DeleteLicencieController',
'editlicencie' => 'EditLicencieController',


'homeeducateur' => 'HomeEducateurController',
'vieweducateur' => 'ViewsEducateurController',
'addeducateur' => 'AddEducateurController',
'deleteeducateur' => 'DeleteEducateurController',
'editeducateur' => 'EditEducateurController',
'login' => 'EditEducateurController',

  
'template' => 'TemplateController',
];


if (array_key_exists($page, $controllers)) {
$controllerName = $controllers[$page];

require_once('controllers/categorie/' . $controllerName . '.php');

 
$controller = new $controllerName($categorieDAO,$licencieDAO,$contactDAO,$educateurDAO);

$controller->$action(isset($_GET['id'])?$_GET['id'] : null); 
} else {
echo "Page non trouvée";
} 
?>
