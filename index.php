<?php

define('CONST_INCLUDE', NULL);

@require_once('template/genericView.php');
@require_once('classes/connexion.php');
@require_once ('classes/JWT.php');
//This contains all the names of the modules
$page = array('home', 'motivation');


$view = new GenericView();

if(isset($_GET['module']) && in_array($_GET['module'], $page))
    $moduleName = $_GET['module'];
else
    $moduleName = 'home';



/*
 * The modules files will have for templates : <nom_module>_module
 * and php files : module_<nom_module>
 */
require_once('modules/' . $moduleName . '_module/module_' . $moduleName . '.php');

session_start();
$_SESSION['token-form'] = JWT::generateTokenForm('form');

$module = new Module();
$viewTemplate = $view->getView();

@require_once("template/template.php");