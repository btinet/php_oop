<?php

namespace App\View\Component;

class HTML extends AbstractComponent
{

    public function __construct(string $doctype = self::DocTypeHtml)
    {
        parent::__construct("html");
        $this->addAttribute('lang',['de']);
        $this->prepend($doctype);
    }

}