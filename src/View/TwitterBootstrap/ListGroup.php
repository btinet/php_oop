<?php

namespace App\View\TwitterBootstrap;

use App\View\Component\Div;

class ListGroup extends Div
{

    public function __construct($class = 'list-group', string $id = null)
    {
        parent::__construct($class, $id);
    }

}
