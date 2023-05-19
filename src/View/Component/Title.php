<?php

namespace App\View\Component;

class Title extends AbstractComponent
{

    public function __construct($text = null)
    {
        parent::__construct("title");
        if($text) $this->add($text,'text');         
    }

}
