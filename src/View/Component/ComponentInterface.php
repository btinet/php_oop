<?php

namespace App\View\Component;

interface ComponentInterface
{
    
    public const DocTypeHtml = '<!DOCTYPE html>';

    public function getParent();

    public function getChildren();

}

