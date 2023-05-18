<?php

namespace App\View\Component;

class Headline extends AbstractComponent
{

    public function __construct(?AbstractComponent $parent = null, $text = null)
    {
        parent::__construct("h1", $parent);
        if($text) $this->add($text);      
    }

    public function setHeadlineType (string $headline)
    {
        $this->elementName = $headline;
    }

}
