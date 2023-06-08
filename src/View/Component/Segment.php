<?php

namespace App\View\Component;

class Segment extends AbstractComponent
{

    public function __construct($text = null)
    {
        parent::__construct("span");
        if($text) $this->add($text);         
    }

}
