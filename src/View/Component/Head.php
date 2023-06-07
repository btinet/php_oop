<?php

namespace App\View\Component;

use JetBrains\PhpStorm\Pure;

class Head extends AbstractComponent
{

    #[Pure] public function __construct()
    {
        parent::__construct("head");       
    }

}
