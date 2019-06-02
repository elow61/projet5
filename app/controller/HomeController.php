<?php

namespace App\Controller;



class HomeController extends Controller {

    public function index() 
    {
        require VIEW_FRONT.'home.php';
    }
}