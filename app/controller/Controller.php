<?php 

namespace App\Controller;

use Src\Helper;
use App\Router\Request;
use App\View\View;

abstract class Controller {
   
    private $action; // Action à réaliser 
    protected $request; // Définit la requête entrante

    public function setRequest(Request $request) {
        $this->request = $request;
    }

    public function executeAction($action) {
        if (method_exists($this, $action)) {
            $this->action = $action;
            $this->{$this->action}();
        } else {
            $fileName = get_class($this);
            throw new Exception('Action' . $action . ' non définie dans la classe ' . $fileName);
        }
    }
    
    // Méthode abstraite correspondant à l'action par défaut (ce qui oblige les classes dérivées à implémenter cette action par défaut)
    abstract function index();

    protected function generateView($datas = []) {
        $fileName = get_class($this);
        $controllerView = str_replace($fileName, "", "Controller");
        $view = new View($this->action, $controller);
        $view->generate($datas);
    }

    protected function redirecting($controller, $action = null) {
        $racine = HOST . '/';
        header('Location: ' . $racine . $controller . '/' . $action);
    }
}