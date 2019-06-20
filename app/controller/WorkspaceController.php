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
        // $list_name = $this->request->getParam('list_name');
        // $lists = $this->list->getLists($_SESSION['id_project']);

        // if (!empty($_SESSION['id_project']))
        // {
        //     if ($this->isAjax())
        //     {
        //         if ($lists['name_list'] !== $list_name)
        //         {
        //             $addList = $this->list->addList($list_name, $_SESSION['id_project']);
        //             echo json_encode($list_name);
        //             header('Content-Type: application/json');
        //         }
        //         else 
        //         {
        //             echo 'Cette liste existe déjà.';
        //         }
        //     }
        //     else 
        //     {
        //         echo 'JavaScript doit être activé.';
        //     }
        // }
        // else 
        // {
        //     echo 'Erreur : Projet non trouvé.';
        // }
        $list = $this->list->getNameList($_SESSION['id_project']);
        $list_name = $this->request->getParam('list_name');

            if (!empty($_SESSION['id_project']))
            {
                if ($list_name === $list['name_list'])
                {
                    echo 'Cette liste existe déjà.';
                }
                else 
                {
                    if ($this->isAjax()) 
                    {
                        $addList = $this->list->addList($list_name, $_SESSION['id_project']);
                        echo json_encode($list_name);
                        header('Content-Type: application/json');

                    }
                }
            }
            else 
            {
                echo 'non non non';
            }

            // if ($this->isAjax())
            // {
            //     if (!empty($_SESSION['id_project']) && !empty($list_name)) 
            //     {
            //         if ($list_name !== $lists['name_list'])
            //         {
            //             $addList = $this->list->addList($list_name, $_SESSION['id_project']);
            //             echo json_encode($list_name);
            //             header('Content-Type: application/json');
            //         }
            //         else 
            //         {
            //             echo 'Cette liste existe déjà !';
            //         }
            //     }
            //     else
            //     {
            //         echo 'Aucun identifiant trouvé';
            //     }
                

            // }
        


    }
}