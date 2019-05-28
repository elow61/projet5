<?php
namespace App\Router;

use App\Controller\Controller;
use App\View\View;

class Router {


    public function run() {
        try {
            $request = new Request(array_merge($_GET, $_POST));
            $controller = $this->callController($request);
            $action = $this->callAction($request);

            $controller->executeAction($action);
        } catch (Exception $e) {
            $this->messageError($e);
        }
    }

    public function callController(Request $request) {
        $controller = 'home'; // Par défaut
        if($request->paramExist('url')) {
            $controller = $request->getParam('url');
            $controller = ucfirst(strtolower($controller));
        }
        $fileName = $controller . 'Controller';
        $file = CONTROLLER.$fileName."Controller.php";
        if (file_exists($file)) {
            require $file;
            $controller = new fileName();
            $controller->setRequest($request);
            return $controller;
        } else {
            echo ('Fichier introuvable');
        }
    }

    public function callAction(Request $request) {
        $action = 'index'; // par défaut
        if ($request->paramExist('action')) {
            $action = $request->getParam('action');
        }
        return $action;
    }

    private function managerError(\Exception $e) {
        $view = new View('Error');
        $view->getError();
    }

    // private $url;

    // public function __construct($url) {
    //     $this->url = $_SERVER['QUERY_STRING'];
    // }
    
    // public function parse($url, $request) {
    //     $url = trim($url, '/');
    //     $params = explode('/', $url);
    //     $request->controller = $params[0];
    //     $request->action = isset($params[1]) ? $params[1] : 'index';
    //     $request->params = array_slice($params, 2);
    //     return true;
    // }

    

    
    
}