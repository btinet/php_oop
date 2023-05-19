<?php

namespace App\View\Component;

class Hyperlink extends AbstractComponent
{

    public function __construct($text = null, string $href = null)
    {
        parent::__construct("a");
        if($text) $this->add($text);
        if($href) $this->addAttribute("href",[$href]);         
    }

}