<?php

namespace App\Controller;

use App\Helper;
use App\Model\UsersManager;

class DashboardController extends Controller {
    
    public function __construct() 
    {
        $this->session = new Helper();
    }

    public function index() 
    {
        if ($this->session->is_connected()) {
            require VIEW_BACK . '/dashboard.php';
        } else {
            echo 'no connecté.';
        }
    }
}