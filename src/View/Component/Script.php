<?php

namespace App\View\Component;

class Script extends AbstractComponent
{

    public function __construct($src = null, string $crossOrigin = null)
    {
        parent::__construct("script");
        if($src) $this->addAttribute("src",[$src]);
        if($crossOrigin) $this->addAttribute("crossorigin",[$crossOrigin]);
    }

}
