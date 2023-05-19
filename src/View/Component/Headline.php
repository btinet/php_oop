<?php

namespace App\View\Component;

class Headline extends AbstractComponent
{

    public function __construct($text = null)
    {
        parent::__construct("h1");
        if($text) $this->add($text);      
    }

    public function setHeadlineType (string $headline)
    {
        $this->elementName = $headline;
    }

}
