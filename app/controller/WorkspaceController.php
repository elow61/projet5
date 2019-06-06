<?php

namespace App\Controller;

class WorkspaceController extends Controller {

    public function index()
    {
        if ($this->session->is_connected())
        {
            if ($this->request->paramExist('id'))
            {
                if ($this->request->getParam('id') && !empty($this->project->getProjectById($this->request->getParam('id'))))
                {   
                    $projects = $this->project->getProject($_SESSION['id']);
                    require VIEW_BACK . 'workspace.php';
                }
                else
                {
                    echo 'Ce projet n\'existe pas.';
                }
            } 
            else 
            {
                echo 'Aucun projet trouvé.';
            }
        } 
        else 
        {
            echo 'Vous devez être connecté.';
        }
    }
}