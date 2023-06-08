<?php

namespace App\View\Component;

class ListUnordered extends AbstractComponent
{

    public function __construct($text = null, $id = null)
    {
        parent::__construct("ul");
        if($text) $this->add($text);
        if($id) $this->addAttribute("id",[$id]);
    }

}

