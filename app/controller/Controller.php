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
            require(VIEW_ERROR.'error-404.php');
        }
    }
    
    // Méthode abstraite correspondant à l'action par défaut (ce qui oblige les classes dérivées à implémenter cette action par défaut)
    abstract function index();

    // Create a project
    public function create() 
    {

        if ($this->request->paramExist('project_name') && $this->request->paramExist('color')) 
        {
            $color = $this->request->getParam('color');
            $project = htmlspecialchars($this->request->getParam('project_name'));
            $projectDB = $this->project->ifProjectExist($_SESSION['id'], $project);

            if ($project !== $projectDB['p_name'])
            {
                if ($this->session->is_connected()) {
                    $project_name = $this->project->newProject($project, $color);
                    $id = $this->project->projectId($_SESSION['id'], $_SESSION['id']);
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

    protected function redirecting($controller, $slash = null, $action = null) 
    {
        $racine = HOST . '/';
        header('Location: ' . $racine . $controller . $slash . $action);
    }

    protected function isAjax()
    {
        return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
    }
}