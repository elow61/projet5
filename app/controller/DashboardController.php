<?php

namespace App\Controller;

class DashboardController extends Controller {

    public function index() 
    {
        if ($this->session->is_connected()) 
        {
            $projects = $this->project->getProject($_SESSION['id']);
            $color = "#3FD5FB";
            $title = 'Tableau de bord | Success Mission';
            require VIEW_BACK . '/dashboard.php';

        } 
        else 
        {
            throw new \Exception('Vous n\'êtes pas connecté.');
        }
    }

    public function delete()
    {
        if ($this->request->paramExist('choice-project'))
        {
            if ($this->session->is_connected())
            {                    
                $project = $this->request->getParam('choice-project');
                $getMain = $this->project->getProjectById($project, $_SESSION['id']);
                if ($getMain['main_user'] == $_SESSION['id'])
                {
                    $deleteProject = $this->project->deleteProject($project, $_SESSION['id']);
                    $deleteProjectFrom = $this->project->deleteProjectFrom($project);
                    $this->redirecting('dashboard');    
                }
                else{
                    throw new \Exception('Vous n\'êtes pas le propriétaire de ce projet.');
                }
            }
            else
            {
                throw new \Exception('Veuillez être connecté avant de supprimer un projet.');
            }
        }
        else 
        {
            throw new \Exception('Sélectionnez un projet à supprimer.');
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
                    $getMain = $this->project->getProjectById($project, $_SESSION['id']);
                    if ($getMain['main_user'] == $_SESSION['id'])
                    {
                        $updatesProject = $this->project->updateProject($newName, $project);
                        $this->redirecting('dashboard');  
                    }
                    else
                    {
                        throw new \Exception('Vous n\'êtes pas le propriétaire de ce projet.');
                    }
                }
                else
                {
                    throw new \Exception('Veuillez être connecté avant de modifier un projet.');
                }
            }
            else
            {
                throw new \Exception('Veuillez entrer un nom pour votre nouveau projet.');
            }
        }
        else
        {
            throw new \Exception('Veuillez choisir un projet avant de le modifier.');
        }
        
    }
}