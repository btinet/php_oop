<?php

namespace App\Controller;


use App\View\Component\Root;
use App\View\Component\Head;
use App\View\Component\HTML;
use App\View\Component\Meta;
use App\View\Component\Title;

abstract class AbstractController
{

    protected Root $root;
    protected Title $title;
    protected Head $head;
    private HTML $html;

    public function __construct()
    {
        $this->html = new HTML();
        $this->root = new Root();
        $this->head = new Head();
        $this->title = new Title('Website-Titel');

        $this->html->add($this->head);
        $this->html->add($this->root);

        $this->head->add(new Meta('charset','UTF-8'));
        $this->head->add($this->title);
    
    }

    protected function render()
    {
        echo $this->html->render();
    }

}