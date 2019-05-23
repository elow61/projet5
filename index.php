<?php
require 'vendor/autoload.php';
require 'config/config.php';

$router = new Src\Router($_GET['url']);

$router->get('/', function() {require 'app/view/frontend/home.php';});
$router->get('/connexion', function() {require 'app/view/frontend/connexion.php';});
$router->get('/inscription', function() {require VIEW_FRONT.'inscription.php';});
$router->get('/dashboard', function() {require VIEW_BACK.'dashboard.php';});

$router->run();