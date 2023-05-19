<?php

namespace App\View\TwitterBootstrap;

use App\View\Component\Hyperlink;

class Button extends Hyperlink
{

    public function __construct($text = 'a', string $href = null, array $buttonStyle = array())
    {
        parent::__construct($text, $href);
        if(!empty($buttonStyle)) {
            $this->addAttribute("class",array_merge(['btn'],$buttonStyle));
        } else {
            $this->addAttribute("class",['btn', 'btn-primary']);
        }

    }

}