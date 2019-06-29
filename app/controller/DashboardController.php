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
                echo 'Veuillez être connecté avant de supprimer un projet.';
            }
        }
        else 
        {
            echo 'Sélectionnez un projet à supprimer.';
        }
    }

    public function update()
    {
        if ($this->request->paramExist('choice-project'))
        {
            if ($this->request->paramExist('newName'))
            {
                if ($this->session->is_connected())
                {
                    $project = $this->request->getParam('choice-project');
                    $newName = $this->request->getParam('newName');
                    $updateProject = $this->project->updateProject($newName, $project);
                    $this->redirecting('dashboard');
                }
                else
                {
                    echo 'Veuillez être connecté avant de modifier un projet.';
                }
            }
            else
            {
                echo 'Veuillez entrer un nom pour votre nouveau projet.';
            }
        }
        else
        {
            echo 'Veuillez choisir un projet avant de le modifier.';
        }
        
    }
}