<?php

namespace App\Controller;

class WorkspaceController extends Controller {

    public function index()
    {
        $project_user = $this->project->getProjectById($this->request->getParam('id'));
        if ($this->session->is_connected())
        {
            if ($this->request->paramExist('id'))
            {
                if ($this->request->getParam('id') && !empty($this->project->getProjectById($this->request->getParam('id'))))
                {   
                    if ($_SESSION['id'] !== $project_user['id_user'])
                    {
                        echo 'Page indisponible.';
                    }
                    else 
                    {
                        $project = $this->project->getOneProject($this->request->getParam('id'));
                        require VIEW_BACK . 'workspace.php';
                    }
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