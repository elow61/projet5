<?php
require 'vendor/autoload.php';
require 'config.php';

$router = new App\Router\Router($_GET['url']);

$router->get('/', function() {require 'view/frontend/home.php';});
$router->get('/connexion', function() {require 'view/frontend/connexion.php';});
$router->get('/inscription', function() {require VIEW_FRONT.'inscription.php';});
$router->get('/dashboard', function() {require VIEW_BACK.'dashboard.php';});


$router->run();