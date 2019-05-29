<?php
session_start();
require 'vendor/autoload.php';
require 'config/config.php';

$router = new App\Router\Router();
$router->run();