<?php

namespace App\Controller;

use App\Helper;
use App\Model\UsersManager;

class WelcomeController extends Controller {


    public function __construct() 
    {
        $this->session = new Helper();
    }

    public function index() {
        if ($this->session->is_connected()) {
            require VIEW_FRONT . '/welcome.php';
        } else {
            echo 'no connecté.';
        }
    }
}