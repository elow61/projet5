<?php

namespace App\Controller;

class DashboardController extends Controller {

    public function index() 
    {
        if ($this->session->is_connected()) 
        {
            $projects = $this->project->getProject($_SESSION['id']);
            require VIEW_BACK . '/dashboard.php';

        } 
        else 
        {
            echo 'no connecté.';
        }
    }
}