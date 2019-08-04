<?php

namespace App\Controller;

class WelcomeController extends Controller {

    public function index() 
    {
        if ($this->session->is_connected()) {
            require VIEW_FRONT . 'welcome.php';
        } else {
            throw new \Exception('Vous n\'êtes pas connecté.');
        }
    }
}