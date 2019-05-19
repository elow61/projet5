<?php
// Page index
require 'vendor/autoload.php';  
// require 'view/frontend/home.php';
$router = new App\Router\Router($_GET['url']);

$router->get('/posts', function(){echo 'Tous les articles';});
$router->get('/posts:id', function($id){echo 'Affiche l\'article' . $id;});
$router->post('/posts:id', function($id){echo 'Poste l\'article' . $id;});

$router->run();