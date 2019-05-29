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
            throw new \Exception('Impossible d\'exécuter la requête.');
        }
    }

    private function callController(Request $request) {
        $controller = 'Home'; // Par défaut
        if($request->paramExist('url')) {
            $controller = $request->getParam('url');
            $controller = ucfirst(strtolower($controller));
        }
        $fileName = 'App\\Controller\\'.$controller . 'Controller';
        $file = CONTROLLER.$controller.'Controller.php';

        if (file_exists($file)) {

            // Instanciation du controller adapté à la requête
            require($file);
      
            $controller = new $fileName();
            $controller->setRequest($request);
            return $controller;
        } else {
            echo ('Fichier '. $file .' introuvable');
        }
    }

    private function callAction(Request $request) {
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