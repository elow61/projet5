<?php

namespace App\Router;

class Request {
    
    private $params;

    public function __construct($params) 
    {
        $this->params = $params;
    }

    public function paramExist($name) 
    {
        return (isset($this->params[$name]) && $this->params[$name] != "");
    }

    public function getParam($name) 
    {
        if ($this->paramExist($name)) 
        {
            return $this->params[$name];
        } 
        else 
        {
            throw new \Exception('Paramètre ' . $name . ' absent de la requête.');
        }
    }
    
}