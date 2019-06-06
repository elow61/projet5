<?php 

namespace App\Controller;

use App\Helper;
use App\Router\Request;
use App\Model\UsersManager;
use App\Model\ProjectManager;
use App\View\View;

abstract class Controller {
    
    protected $session;
    protected $users;
    protected $project;
    private $action; // Action à réaliser 
    protected $request; // Définit la requête entrante

    public function setRequest(Request $request) 
    {
        $this->request = $request;
        $this->users = new UsersManager();
        $this->project = new ProjectManager();
        $this->session = new Helper();

    }

    public function executeAction($action) 
    {
        if (method_exists($this, $action)) {
            $this->action = $action;
            $this->{$this->action}();
        } else {
            $fileName = get_class($this);
            throw new \Exception('Action' . $action . ' non définie dans la classe ' . $fileName);
        }
    }
    
    // Méthode abstraite correspondant à l'action par défaut (ce qui oblige les classes dérivées à implémenter cette action par défaut)
    abstract function index();

    public function create() 
    {
        if ($this->request->paramExist('project_name')) 
        {
            $project = htmlspecialchars($this->request->getParam('project_name'));
            if ($this->session->is_connected()) {
                $project_name = $this->project->newProject($project);
                $id = $this->project->projectId($_SESSION['id'], $project);
                $this->redirecting('dashboard');
            } 
            else 
            {
                'Veuillez être connecté avant de créer un projet.';
            }
        } 
        else 
        {
            echo 'Veuillez entrer un nom de projet.';
        }
    }

    protected function generateView($datas = []) 
    {
        $fileName = get_class($this);
        $controllerView = str_replace($fileName, "", "Controller");
        $view = new View($this->action, $controller);
        $view->generate($datas);
    }

    protected function redirecting($controller, $action = null) 
    {
        $racine = HOST . '/';
        header('Location: ' . $racine . $controller . '/' . $action);
    }
}