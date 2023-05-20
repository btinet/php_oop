<?php

namespace App\View\TwitterBootstrap;

enum TextType
{

    public const PRIMARY    = 'text-'.Color::PRIMARY;
    public const SECONDARY  = 'text-'.Color::SECONDARY;
    public const SUCCESS    = 'text-'.Color::SUCCESS;
    public const WARNING    = 'text-'.Color::WARNING;
    public const DANGER     = 'text-'.Color::DANGER;
    public const INFO       = 'text-'.Color::INFO;
    public const LIGHT      = 'text-'.Color::LIGHT;
    public const DARK       = 'text-'.Color::DARK;

}