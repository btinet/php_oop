<?php

namespace App\Model;

use App\Controller\AbstractController;
use JetBrains\PhpStorm\Pure;
use ReflectionClass;
use ReflectionException;

class Response
{

    public function generateUrlFromString(string $class, string $method, array $mandatory = null,$anchor = null): string
    {

        $path ="";

        try {
            if(new $class() instanceof AbstractController) {
                $reflectionClass = new ReflectionClass($class);
            } else {
                echo "Klasse erbt nicht von AbstractController";
            }

            if(method_exists($class,$method)) {
                $className =  strtolower(str_replace("Controller", "", $reflectionClass->getShortName()));

                $path .= "?controller=$className&action=$method";                

                if ($mandatory) {
                    foreach ($mandatory as $name => $value) {
                        $path .= "&$name=$value";
                    }
                }
                if($anchor){
                    $path .= "#$anchor";
                }
                

            } else {
                echo "Methode $method existiert nicht in $class.";
            }
            
            return $this->getProtocol().$_SERVER['HTTP_HOST'].$path;

        } catch (ReflectionException $e)
        {
            die("Klasse existiert nicht");
        }

    }

    #[Pure] public function generateLink(string $target): string
    {
        return $this->getProtocol() . $_SERVER['HTTP_HOST'] . $target;
    }

    /**
     * @return string protocol and host.
     */
    private function getProtocol(): string
    {
        return (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    }

}
