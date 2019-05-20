<?php
// Page index
require 'vendor/autoload.php';  
$router = new App\Router\Router($_GET['url']);

$router->get('/', function() {require 'view/frontend/home.php';});
$router->get('/connexion', function() {require 'view/frontend/connexion.php';});
$router->get('/posts', function(){echo 'Tous les articles';});
$router->get('/posts:id', function($id){echo 'Affiche l\'article' . $id;});
$router->post('/posts:id', function($id){echo 'Poste l\'article' . $id;});

$router->run();