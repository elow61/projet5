<?php 

ini_set('display_errors', 'on');
error_reporting(E_ALL);

$host = $_SERVER['HTTP_HOST'];
$root = $_SERVER['DOCUMENT_ROOT'];

define('HOST', 'http://'.$host);
define('ROOT', $root);

define('CLASSES', ROOT.'/class/');
define('VIEW_FRONT', ROOT.'/view/frontend/');
define('VIEW_BACK', ROOT.'/view/backend/');

define('CSS', HOST.'/public/css/');
define('IMAGES', HOST.'/public/images/');
define('JS', HOST.'/public/js/');
