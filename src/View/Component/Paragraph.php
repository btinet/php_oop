<?php

namespace App\View\Component;

class Paragraph extends AbstractComponent
{

    public function __construct(?AbstractComponent $parent = null, $text = null)
    {
        parent::__construct("p", $parent);
        if($text) $this->add($text);         
    }

}
