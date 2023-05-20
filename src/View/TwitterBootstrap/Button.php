<?php

namespace App\View\TwitterBootstrap;

use App\View\Component\Hyperlink;

class Button extends Hyperlink
{

    public function __construct($text = 'a', string $href = null, string $buttonType = ButtonType::PRIMARY)
    {
        parent::__construct($text, $href);
        $this->addAttribute("class",['btn', $buttonType]);
    }

}