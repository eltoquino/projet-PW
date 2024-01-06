<?php

 include('classes/dao/LoginDAO.php'); 

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
'homecategorie' => 'categorie/HomeCategorieController',
'viewcategorie' => 'categorie/ViewsCategorieController',
'addcategorie' => 'categorie/AddCategorieController',
'deletecategorie' => 'categorie/DeleteCategorieController',
'editcategorie' => 'categorie/EditCategorieController',

 
'homecontact' => 'contact/HomeContactController',
'viewcontact' => 'contact/ViewsContactController',
'addcontact' => 'contact/AddContactController',
'deletecontact' => 'contact/DeleteContactController',
'editcontact' => 'contact/EditContactController',

'homelicencie' => 'licencie/HomeLicencieController',
'viewlicencie' => 'licencie/ViewsLicencieController',
'addlicencie' => 'licencie/AddLicencieController',
'deletelicencie' => 'licencie/DeleteLicencieController',
'editlicencie' => 'licencie/EditLicencieController',


'homeeducateur' => 'educateur/HomeEducateurController',
'vieweducateur' => 'educateur/ViewsEducateurController',
'addeducateur' => 'educateur/AddEducateurController',
'deleteeducateur' => 'educateur/DeleteEducateurController',
'editeducateur' => 'educateur/EditEducateurController',

'login' => 'LoginController',

'logout' => 'LogoutController',

'exporterlicencie' => 'licencie/ExporterLicencieController',

'importerlicencie' => 'licencie/ImporterLicencieController',

'traiterimportationlicencie' => 'licencie/ImporterLicencieController',
'home_after_importation' => 'licencie/ImporterLicencieController',
  
'template' => 'TemplateController',
];

 //var_dump($controllers);

if (array_key_exists($page, $controllers)) {
 
$controllerName = $controllers[$page];
 //var_dump($controllerName);
  //var_dump($page);
 //die();

 if(strpos($controllerName, '/') !== false)
 {
 //echo 'oui';
    list($racine, $controllerName) = explode("/", $controllerName);
    require_once('controllers/' .$racine.'/'.$controllerName . '.php');
 }
 else{
    //echo 'non';
    require_once('controllers/' .$controllerName . '.php');
 }
  

 
$controller = new $controllerName($categorieDAO,$licencieDAO,$contactDAO,$educateurDAO,$loginDAO);

$controller->$action(isset($_GET['id'])?$_GET['id'] : null); 
} else {
echo "Page non trouvée";
} 
?>
