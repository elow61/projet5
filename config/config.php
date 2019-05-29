<?php 

ini_set('display_errors', 'on');
error_reporting(E_ALL);

$host = $_SERVER['HTTP_HOST'];
$root = $_SERVER['DOCUMENT_ROOT'];

define('HOST', 'http://'.$host);
define('ROOT', $root);
define('CONTROLLER', ROOT.'/app/controller/');
// define('CLASSES', ROOT.'/app/class/');
define('VIEW_FRONT', ROOT.'/app/view/frontend/');
define('VIEW_BACK', ROOT.'/app/view/backend/');

define('CSS', HOST.'/public/css/');
define('IMAGES', HOST.'/public/images/');
define('JS', HOST.'/public/js/');
