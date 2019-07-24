<?php

namespace App\Controller;


class WorkspaceController extends Controller {

    public function index()
    {
        if ($this->session->is_connected())
        {
            if ($this->request->paramExist('id'))
            {
                $project_user = $this->project->getProjectById($this->request->getParam('id'), $_SESSION['id']);

                if ($_SESSION['id'] !== $project_user['id_user'])
                {
                    throw new \Exception('Page indisponible.');
                }
                else 
                {
                    $_SESSION['id_project'] = $project_user['id_project'];
                    $main_user = $project_user['main_user'];
                    $getImg = $this->project->getImg($_SESSION['id_project']);
                    $project = $this->project->getOneProject($this->request->getParam('id'));
                    $lists = $this->list->getLists($this->request->getParam('id'));
                    $tasks = $this->task->getTasks($this->request->getParam('id'));
                    require VIEW_BACK . 'workspace.php';
                }
            } 
            else 
            {
                throw new \Exception('Aucun projet trouvé.');
            }
        } 
        else 
        {
            throw new \Exception('Vous devez être connecté.');
        }
    } 

    public function lists() 
    {
        if ($this->isAjax())
        {
            $response = [];
            $list_name = htmlspecialchars($this->request->getParam('list_name'));
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
        else
        {
            require(VIEW_ERROR.'error-404.php');
        }
    }

    public function removeLists() 
    {
        if ($this->isAjax())
        {
            $response = [];
            $idList = $this->request->getParam('id_list');
                if (!empty($_SESSION['id_project']))
                {
                    $removeList = $this->list->removeList($idList);
                    $deleteTask = $this->task->deleteTasksByList($idList);
                    $response = $idList;
                    header('Content-type: application/json');
                }
                else 
                {
                    $response['error'] = 'Aucun projet trouvé.';
                }
            echo json_encode($response);
        }
        else        
        {
            require(VIEW_ERROR.'error-404.php');
        }
        
    }

    public function addTask()
    {
        if ($this->isAjax())
        {
            $response = [];
            if (!empty($_SESSION['id_project']))
            {
                if ($this->request->paramExist('name_task'))
                {
                    $taskName = nl2br(htmlspecialchars($this->request->getParam('name_task')));
                    $ifTaskName = $this->list->getNameList($_SESSION['id_project'], $taskName);

                    if ($this->request->paramExist('id_list'))
                    {
                        $idList = $this->request->getParam('id_list');
                        if ($ifTaskName['name_task'] == $taskName) 
                        {
                            $response['error'] = 'Cette tâche existe déjà !';
                        }
                        else 
                        {
                            $task = $this->task->addTasks($taskName, $_SESSION['id'], $_SESSION['id_project'], $idList);
                            $id_task = $this->task->getTaskById($idList, $_SESSION['id_project']);
                            $response['id_task'] = $id_task;
                            $response['name'] = $taskName;
                            $response['user'] = $_SESSION['id'];
                            $response['project'] = $_SESSION['id_project'];
                            $response['list'] = $idList;
                            header('Content-type: application/json');
                        }
                    }
                } 
                else
                {
                    $response['error'] = 'Impossible d\'ajouter votre tâche.';
                }
            } 
            else 
            {
                $response['error'] = 'Aucun project n\'est relié à cette tâche.';
            }
            echo json_encode($response);
        }
        else        
        {
            throw new \Exception('Vous vous êtes trompée de page.');
        }
    }

    public function deleteTask()
    {
        if ($this->isAjax())
        {
            $response = [];
            $idTask = $this->request->getParam('id_task');
            if (!empty($_SESSION['id_project']))
            {
                $deleteTask = $this->task->deleteTask($idTask);
                $response = $idTask;
                header('Content-type: application/json');
            }
            else 
            {
                $response['error'] = 'Tâche introuvable';
            }
            echo json_encode($response);

        }
        else
        {
            require(VIEW_ERROR.'error-404.php');
        }
    }

    public function updateTask()
    {
        if ($this->isAjax())
        {
            $response = [];
            $idTask = $this->request->getParam('id_task');
            if (!empty($_SESSION['id_project']))
            {
                if ($this->request->paramExist('newTask'))
                {
                    $newName = nl2br(htmlspecialchars($this->request->getParam('newTask')));

                    $updateTask = $this->task->updateTask($newName, $idTask);
                    $response['id'] = $idTask;
                    $response['name'] = $newName;
                    header('Content-type: application/json');
                }
                else
                {
                    $response['error'] = 'Impossible de modifier la tâche.';
                }
            }
            else
            {
                $response['error'] = 'Vous n\'êtes pas connecté.';
            }
        }
        else
        {
            require(VIEW_ERROR.'error-404.php');
        }
        echo json_encode($response);
    }

    public function giveProject()
    {
        if ($this->request->paramExist('invit_member'))
        {
            $newMember = $this->request->getParam('invit_member');
            $user = $this->users->get($newMember);
            if ($newMember == $user['email'])
            {
                $idProject = $_SESSION['id_project'];
                $member = $this->project->getProjectById($idProject, $user['id_user']);
                if (!$member)
                {
                    $giveProject = $this->project->giveProject($user['id_user'], $idProject, $_SESSION['id']);
                    $getImg = $this->project->getImg($_SESSION['id_project']);
                    $this->redirecting('workspace/'.$idProject);
                }
                else 
                {
                    throw new \Exception('Cette personne a déjà accès à ce projet.');
                }
                
            }
            else {
                throw new \Exception('Cet utilisateur n\'est pas inscrit en base.');
            }
            
        } else {
            throw new \Exception('Veuillez entrer l\'adresse email.');
        }
        
    }
}