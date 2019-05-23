<?php 

namespace App\Controller;

use \App\Model\UsersManager;

abstract class Controller {
    
    protected $action = '';
    protected $view = '';

    public function __construct($action, $view) {
        $this->setAction($action);
        $this->ssetView($view);

    }

    public function executeAction() {
        if (method_exists($this, $action)) {
            $this->action = $action;
            $this->{$this->action}();
        } else {
            $controller = get_class($this);
            throw new Exception('Action '.$action.' non définie dans la classe '.$controller);
        }
    }

    public function setAction($action) {
        if (!is_string($action) || empty($action)) {
            throw new Exception('L\'action doit être une chaine de caractère.');
        }

        $this->action = $action;
    }

    public function setView($view) {
        if (!is_string($view) || empty($view)) {
            throw new Exception('La vue doit être une chaine de caractère.');
        }

        $this->view = $view;
    }


}