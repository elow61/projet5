<?php

namespace App\Controller;

use App\Helper;
use App\Model\UsersManager;
use App\Model\ProjectManager;

class WelcomeController extends Controller {

    private $project;

    public function __construct() 
    {
        $this->project = new ProjectManager();
        $this->session = new Helper();
    }

    public function index() 
    {
        if ($this->session->is_connected()) {
            require VIEW_FRONT . '/welcome.php';
        } else {
            echo 'no connecté.';
        }
    }

    public function create() 
    {

        if ($this->request->paramExist('project_name')) 
        {
            $project = htmlspecialchars($this->request->getParam('project_name'));
            if ($this->session->is_connected()) {
                $project_name = $this->project->newProject($project);
                $project_id = $this->project->projectId($_SESSION['id']);
                $this->redirecting('dashboard');
            } 
            else 
            {
                'Veuillez être connecté avant de créer un projet.';
            }
        } 
        else 
        {
            echo 'Veuillez entrer un nom de projet.';
        }
    }
}