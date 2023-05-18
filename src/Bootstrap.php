<?php

namespace App;

use App\Model\Request;

class Bootstrap
{

    protected Request $request = Request::GET;

    protected  $controller;

    public function __construct()
    {
        
        if(!$this->request->get("controller")) die ("Controller fehlt!");

        $controllerClass = "App\\Controller\\" . ucfirst($this->request->get("controller")) . "Controller";
        if(!class_exists($controllerClass)) echo "Klasse nicht verfügbar!";        

        $this->controller = new $controllerClass();

        if(!$this->request->get("action")) $method = 'index';
        if(!method_exists($this->controller,$method)) die ("Methode nicht verfügbar!");

        $this->controller->$method();

    }

}
