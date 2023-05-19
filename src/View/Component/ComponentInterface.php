<?php

namespace App\View\Component;

interface ComponentInterface
{
    
    public const DocTypeHtml = '<!DOCTYPE html>';
    public const H1 = "h1";
    public const H2 = "h2";
    public const H3 = "h3";
    public const H4 = "h4";
    public const H5 = "h5";
    public const H6 = "h6";

    public function getParent();

    public function getChildren();

}
