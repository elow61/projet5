<?php

namespace App\Controller;

class HomeController extends Controller {

    public function index() 
    {
        $title = 'Accueil | Success Mission';
        require VIEW_FRONT.'home.php';
    }
}