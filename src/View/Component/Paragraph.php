<?php

namespace App\View\Component;

class Paragraph extends AbstractComponent
{

    public function __construct($text = null)
    {
        parent::__construct("p");
        if($text) $this->add($text);         
    }

}
