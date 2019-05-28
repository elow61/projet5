<?php

session_start();
require 'vendor/autoload.php';
require 'config/config.php';

$router = new App\Router\Router();
$router->run();

// $router = new Src\Router($_GET['url']);

// $router->get('/', function() {require 'app/view/frontend/home.php';});
// $router->get('/connexion', function() {require 'app/view/frontend/connexion.php';});
// $router->get('/inscription', function() {require VIEW_FRONT.'inscription.php';});
// $router->get('/dashboard', function() {require VIEW_BACK.'dashboard.php';});

// $router->post('/inscription/:nosuccess', function() {require VIEW_FRONT.'inscription.php';});
// $router->post('/connexion/:login', 'Connexion#login');
// $router->post('/inscription/register', 'Connexion#register');


// // $router->scope('/inscription', function($router) {$router->get('/register', 'Connexion#register'); });

// $router->run();



// $pass = password_hash('test', PASSWORD_DEFAULT);

// echo $_SERVER['QUERY_STRING'];