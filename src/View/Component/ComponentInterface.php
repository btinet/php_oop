<?php

namespace App\View\Component;

interface ComponentInterface
{
    
    public const DocTypeHtml = '<!DOCTYPE html>';
    public const DocTypeXhtml = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"'. PHP_EOL .
    '"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">';

    public function getParent();

    public function getChildren();

}

