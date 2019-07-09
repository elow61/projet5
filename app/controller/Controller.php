<?php 

namespace App\Controller;

use App\Helper;
use App\Router\Request;
use App\Model\UsersManager;
use App\Model\ProjectManager;
use App\Model\ListsManager;
use App\Model\TasksManager;

abstract class Controller {
    
    protected $session;
    protected $users;
    protected $project;
    protected $list;
    protected $task;
    private $action; // Action à réaliser 
    protected $request; // Définit la requête entrante

    public function setRequest(Request $request) 
    {
        $this->request = $request;
        $this->users = new UsersManager();
        $this->project = new ProjectManager();
        $this->list = new ListsManager();
        $this->task = new TasksManager();
        $this->session = new Helper();

    }

    public function executeAction($action) 
    {
        if (method_exists($this, $action)) {
            $this->action = $action;
            $this->{$this->action}();
        } else {
            $fileName = get_class($this);
            throw new \Exception('Action "' . $action . '" non définie dans la classe ' . $fileName);
        }
    }
    
    // Méthode abstraite correspondant à l'action par défaut (ce qui oblige les classes dérivées à implémenter cette action par défaut)
    abstract function index();

    // Create a project
    public function create() 
    {
        $projectDB = $this->project->getProjectByName($this->request->getParam('project_name'));

        if ($this->request->paramExist('project_name') && $this->request->paramExist('color')) 
        {
            $color = $this->request->getParam('color');
            $project = htmlspecialchars($this->request->getParam('project_name'));

            if ($project !== $projectDB['project_name'])
            {
                if ($this->session->is_connected()) {
                    $project_name = $this->project->newProject($project, $color);
                    $id = $this->project->projectId($_SESSION['id'], $project);
                    $this->redirecting('dashboard');
                } 
                else 
                {
                    throw new \Exception('Veuillez être connecté avant de créer un projet.');
                } 
            }
            else 
            {
                throw new \Exception('Le projet existe déjà.');
            }

            
        } 
        else 
        {
            throw new \Exception('Veuillez entrer un nom de projet ou sélectionner une couleur de référence.');
        }
    }

    protected function redirecting($controller, $action = null) 
    {
        $racine = HOST . '/';
        header('Location: ' . $racine . $controller . '/' . $action);
    }

    protected function getError(\Exception $exception)
    {
        $errorMessage = $exception->getMessage();
        require VIEW_FRONT.'error.php';
    }

    protected function isAjax()
    {
        return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
    }
}