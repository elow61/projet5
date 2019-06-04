<?php

namespace App\Controller;

use App\Model\UsersManager;

class WelcomeController extends Controller {

    private $user;

    public function __construct() 
    {
        $this->user = new UsersManager();
    }

    public function index() 
    {
        if ($this->session->is_connected()) {
            require VIEW_FRONT . '/welcome.php';
        } else {
            echo 'no connecté.';
        }
    }
}