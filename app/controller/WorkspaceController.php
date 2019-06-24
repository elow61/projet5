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
                if ($this->request->getParam('id') && !empty($project_user))
                {   
                    if ($_SESSION['id'] !== $project_user['id_user'])
                    {
                        echo 'Page indisponible.';
                    }
                    else 
                    {
                        $_SESSION['id_project'] = $project_user['id_project'];
                        $project = $this->project->getOneProject($this->request->getParam('id'));
                        $lists = $this->list->getLists($this->request->getParam('id'));
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

    protected function isAjax()
    {
        return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
    }

    public function lists() 
    {
        $response = [];
        $list_name = $this->request->getParam('list_name');
        $list = $this->list->getNameList($_SESSION['id_project'], $list_name);
        if (!empty($_SESSION['id_project']))
        {

            if ($list_name == $list['name_list'])
            {
                $response['error'] = 'Cette liste existe déjà.';
            }
            else 
            {
                $addList = $this->list->addList($list_name, $_SESSION['id_project']);
                $lists = $this->list->getNameList($_SESSION['id_project'], $list_name);

                $response['success'] = $list_name;
                $response['id'] = $lists['id_list'];
                header('Content-Type: application/json');
            }
        }
        else 
        {
            $response[errors] = 'Aucun projet existant';
        }
        echo json_encode($response);
    }

    public function removeLists() 
    {
        $response = [];
        $idList = $this->request->getParam('name_list');
            if (!empty($_SESSION['id_project']))
            {
                    // if ($idList == $list['id_list'])
                    // {
                        $removeList = $this->list->removeList($idList);
                        $response = $idList;
                        header('Content-type: application/json');
                    // }
                    // else 
                    // {
                    //     $response['error'] = 'Cette liste n\'existe plus.';
                    // }
                
            }
            else 
            {
                $response['error'] = 'Aucun projet trouvé.';
            }
        echo json_decode($response);
    }
}