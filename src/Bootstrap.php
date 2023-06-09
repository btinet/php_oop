<?php

namespace App;

use App\Controller\AbstractController;
use App\Controller\NotFoundController;
use App\Model\Request;
use LogicException;

class Bootstrap
{

    protected Request $request = Request::GET;

    protected AbstractController $controller;

    protected string $defaultController = "computer";

    public function __construct()
    {
        
        try {
            $this->getClass()->runMethod();
        } catch (LogicException $e)
        {
            $notFoundController = new NotFoundController();
            echo $notFoundController->index();
        }

    }

    protected function getClass(): Bootstrap
    {
        if(!$controllerName = $this->request->get("controller")) $controllerName = $this->defaultController;        
        $controllerClass = "App\\Controller\\" . ucfirst($controllerName) . "Controller";
        
        if(!class_exists($controllerClass)) throw new LogicException("Controller {$controllerClass} existiert nicht!"); 
        $this->controller = new $controllerClass();

        return $this;
    }

    protected function runMethod(): void
    {
        if(!$method = $this->request->get("action")) $method = 'index';
        if(!method_exists($this->controller,$method)) throw new LogicException("Methode {$method} existiert nicht!");

        echo $this->controller->$method();
    }

}
