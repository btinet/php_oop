<?php

namespace App\View\TwitterBootstrap;

enum ButtonType
{

    public const PRIMARY    = 'btn-'.Color::PRIMARY;
    public const SECONDARY  = 'btn-'.Color::SECONDARY;
    public const SUCCESS    = 'btn-'.Color::SUCCESS;
    public const WARNING    = 'btn-'.Color::WARNING;
    public const DANGER     = 'btn-'.Color::DANGER;
    public const INFO       = 'btn-'.Color::INFO;
    public const LIGHT      = 'btn-'.Color::LIGHT;
    public const DARK       = 'btn-'.Color::DARK;

}