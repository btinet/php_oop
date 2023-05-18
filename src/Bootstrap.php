<?php

namespace App;

use App\Model\Request;
use LogicException;

class Bootstrap
{

    protected Request $request = Request::GET;

    protected $controller;

    public function __construct()
    {
        
        try {
            $this->getClass()->runMethod();
        } catch (LogicException $e)
        {
            echo $e->getMessage();
        }

    }

    protected function getClass(): Bootstrap
    {
        if(!$this->request->get("controller")) throw new LogicException("Key \"controller\" nicht gesetzt!");
        $controllerClass = "App\\Controller\\" . ucfirst($this->request->get("controller")) . "Controller";
        if(!class_exists($controllerClass)) throw new LogicException("Controller {$controllerClass} existiert nicht!"); 
        $this->controller = new $controllerClass();

        return $this;
    }

    protected function runMethod(): void
    {
        if(!$method = $this->request->get("action")) $method = 'index';
        if(!method_exists($this->controller,$method)) throw new LogicException("Methode {$method} existiert nicht!");

        $this->controller->$method();
    }

}
