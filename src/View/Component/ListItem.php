<?php

namespace App\View\Component;

class ListItem extends AbstractComponent
{

    public function __construct($text = null)
    {
        parent::__construct("li");
        if($text) $this->add($text);         
    }

}

