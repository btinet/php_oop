<?php

namespace App\View\TwitterBootstrap\ComponentBuilder;

use App\View\Component\AbstractComponent;
use App\View\Component\Div;
use App\View\Component\Hyperlink;
use App\View\TwitterBootstrap\ListGroup;

class ListGroupComponentBuilder
{
    private array $children = array();
    private bool $isListGroupFlush;

    public function __construct(bool $isListGroupFlush = false)
    {
        $this->isListGroupFlush = $isListGroupFlush;
    }

    /**
     * Builder zurücksetzen
     */
    public function reset()
    {
        $this->children = array();
    }

    public function addListItem (AbstractComponent $component, $id = null): ListGroupComponentBuilder
    {
        if($component instanceof Hyperlink)
        {
            $component->addStyle(["list-group-item","list-group-item-action"]);
            $this->children[] = $component;
        } else {
            $div = new Div("list-group-item",$id);
            $div->add($component);
            $this->children[] = $div;
        }

        return $this;
    }

    public function createListGroup(): ListGroup
    {
        $listGroup = new ListGroup();

        if($this->isListGroupFlush) $listGroup->addStyle(["list-group-flush"]);

        foreach ($this->children as $child)
        {
            $listGroup->add($child);
        }
        return $listGroup;
    }

}
