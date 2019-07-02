<?php

namespace App\Controller;



class ErrorController extends Controller {

    public function index() 
    {
        require VIEW_FRONT.'error.php';
    }
}