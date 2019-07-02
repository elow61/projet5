<?php
namespace App\Router;

use App\Controller\Controller;
use App\View\View;

class Router {


    public function run() 
    {
        try 
        {
            $request = new Request(array_merge($_GET, $_POST));
            $controller = $this->callController($request);
            $action = $this->callAction($request);

            $controller->executeAction($action);
        } 
        catch (\Exception $e) 
        {
            $this->managerError($e);
        }
    }

    private function callController(Request $request) 
    {
        $controller = 'Home'; // Par défaut
        if($request->paramExist('url')) 
        {
            $controller = $request->getParam('url');
            $controller = ucfirst(strtolower($controller));
        }
        $fileName = 'App\\Controller\\'.$controller . 'Controller';
        $file = CONTROLLER.$controller.'Controller.php';

        if (file_exists($file)) 
        {
            // Instanciation du controller adapté à la requête
            require($file);
      
            $controller = new $fileName();
            $controller->setRequest($request);
            return $controller;
        } 
        else 
        {
            throw new \Exception('Fichier '. $file .' introuvable');
        }
    }

    private function callAction(Request $request) 
    {
        $action = 'index'; // par défaut
        if ($request->paramExist('action')) 
        {
            $action = $request->getParam('action');
        }
        return $action;
    }

    private function managerError(\Exception $exception) 
    {
        $errorMessage = $exception->getMessage();
        require(VIEW_FRONT.'error.php');
    }    
}