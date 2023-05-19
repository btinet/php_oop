<?php

namespace App\View\Component;

class Div extends AbstractComponent
{

    public function __construct($class = null, string $id = null)
    {
        parent::__construct("div");
        if($class) $this->addAttribute("class",[$class]);
        if($id) $this->addAttribute("id",[$id]);
    }

}
