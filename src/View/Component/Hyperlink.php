<?php

namespace App\View\Component;

class Hyperlink extends AbstractComponent
{

    public function __construct($text = null, array $href = array())
    {
        parent::__construct("a");
        if($text) $this->add($text);
        if(!empty($href)) $this->addAttribute("href",$href);         
    }

}