<?php

namespace App\View\Component;

class Hyperlink extends AbstractComponent
{

    public function __construct(?AbstractComponent $parent = null, $text = null, $href = null)
    {
        parent::__construct("a", $parent);
        if($text) $this->add($text);
        if($href) $this->addAttribute("href",$href);         
    }

}