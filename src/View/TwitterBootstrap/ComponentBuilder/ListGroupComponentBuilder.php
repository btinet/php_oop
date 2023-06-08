<?php

namespace App\View\TwitterBootstrap\ComponentBuilder;

use App\View\Component\AbstractComponent;
use App\View\Component\Div;
use App\View\Component\Hyperlink;
use App\View\TwitterBootstrap\ListGroup;

class ListGroupComponentBuilder
{
    private ListGroup $listGroup;

    public function __construct()
    {
        $this->listGroup = new ListGroup();
    }

    public function addListItem (AbstractComponent $component, $id = null): ListGroupComponentBuilder
    {
        if($component instanceof Hyperlink)
        {
            $component->addAttribute("class",["list-group-item","list-group-item-action"]);
            $this->listGroup->add($component);
        } else {
            $div = new Div("list-group-item",$id);
            $div->add($component);
            $this->listGroup->add($div);
        }

        return $this;
    }

    public function createListGroup(): ListGroup
    {
        return $this->listGroup;
    }

}
