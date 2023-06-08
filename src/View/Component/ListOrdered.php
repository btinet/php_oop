<?php

namespace App\View\Component;

class ListOrdered extends AbstractComponent
{

    public function __construct($text = null)
    {
        parent::__construct("ol");
        if($text) $this->add($text);         
    }

}

