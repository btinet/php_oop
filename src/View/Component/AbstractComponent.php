<?php

namespace App\View\Component;

use ArrayIterator;
use ArrayObject;

abstract class AbstractComponent implements ComponentInterface
{
    
    protected $parent;
    protected array $children = array();
    protected array $attributes = array();
    protected string $output = "";

    protected string $elementName;

    public function __construct(string $elementName, ?AbstractComponent $parent = null)
    {
        $this->elementName = $elementName;
        $this->parent = $parent;
    }

    public function __toString()
    {
        return $this->elementName;
    }

    protected function getElementName()
    {
        return $this->elementName;
    }


    public function getChildren()
    {
        return $this->children;
    }

    public function add($element, $key = null)
    {
        if($element instanceof AbstractComponent) $element->setParent($this);

        if($key) {
            $this->children[$key] = $element;
        } else {
            $this->children[] = $element;
        }
        
    }

    public function getParent()
    {
        return $this->parent;
    }

    public function setParent($parent)
    {
        $this->parent = $parent;
    }

    public function getAttributes()
    {
        return $this->attributes;
    }

    public function render()
    {
        $this->output ="<{$this->elementName}>";

        $arrayObject = new ArrayObject($this->children);
        $iterator = $arrayObject->getIterator();

        while($iterator->valid())
        {
            $current = $iterator->current();
            if($current instanceof AbstractComponent) {
                $this->output .= $current->render();
            } else {
                $this->output .= $current;
            }
            $iterator->next();
        }

        $this->output .="</{$this->elementName}>";

        return $this->output;
    }


}