<?php

namespace App\View\Component;

class HTML extends AbstractComponent
{

    public function __construct()
    {
        parent::__construct("html");
        $this->addAttribute('lang',['de']);       
    }

}