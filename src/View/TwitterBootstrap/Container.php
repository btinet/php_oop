<?php

namespace App\View\TwitterBootstrap;

use App\View\Component\Div;

class Container extends Div
{

    public function __construct($class = 'container', string $id = null)
    {
        parent::__construct($class, $id);
    }

}
