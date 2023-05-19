<?php

namespace App\View\Component;

use ArrayIterator;
use ArrayObject;

abstract class AbstractComponent implements ComponentInterface
{
    
    protected $parent = null;
    protected array $children = array();
    protected array $attributes = array();
    protected string $output = "";

    protected string $elementName;

    public function __construct(string $elementName)
    {
        $this->elementName = $elementName;
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
        return new ArrayObject($this->children);
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

    public function addAttribute($key, array $values = array())
    {
        if($this->getChildren()->offsetExists($key))
        {
            $oldElements = $this->getChildren()->offsetGet($key);
            $allElements = array_merge($oldElements,$values);
            $this->attributes[$key] = $allElements;

        } else {
            $this->attributes[$key] = $values;
        }  
    }

    public function render()
    {
        $this->output ="<{$this->elementName}";
        
        foreach($this->attributes as $key => $values)
        {
            if(empty($values))
            {
                $this->output .= " $key";
            } else {
                $this->output .= " {$key}='". implode(' ', $values) ."'";
            }
        }

        $this->output .= ">";

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