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

    public function delete()
    {
        if ($this->request->paramExist('choice-project'))
        {
            if ($this->session->is_connected())
            {
                $project = $this->request->getParam('choice-project');
                $deleteProject = $this->project->deleteProject($project, $_SESSION['id']);
                $deleteProjectFrom = $this->project->deleteProjectFrom($project);
                $this->redirecting('dashboard');
            }
            else
            {
                'Veuillez être connecté avant de supprimer un projet.';
            }
        }
        else 
        {
            echo 'Sélectionnez un projet à supprimer.';
        }
    }
}