<?php

namespace App\View\Component;

use ArrayObject;

abstract class AbstractComponent implements ComponentInterface
{
    
    protected AbstractComponent|null $parent = null;
    protected array $children = array();
    protected array $prependedElements = array();
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

    protected function getElementName(): string
    {
        return $this->elementName;
    }


    public function getChildren(): ArrayObject
    {
        return new ArrayObject($this->children);
    }

    public function prepend($element)
    {
        $this->prependedElements[] = $element;
    }

    public function add($element, $key = null): AbstractComponent
    {
        if($element instanceof AbstractComponent) $element->setParent($this);

        if($key) {
            $this->children[$key] = $element;
        } else {
            $this->children[] = $element;
        }
        return $this;
    }

    public function getParent(): ?AbstractComponent
    {
        return $this->parent;
    }

    public function setParent(AbstractComponent $parent)
    {
        $this->parent = $parent;
    }


    public function getAttributes(): array
    {
        return $this->attributes;
    }

    public function addAttribute($key, array $values = array())
    {
        if(key_exists($key,$this->attributes))
        {
            $this->attributes[$key] = array_merge($this->attributes[$key],$values);
        } else {
            $this->attributes[$key] = $values;
        }  
    }

    public function render(): string
    {
        foreach ($this->prependedElements as $element)
        {
            $this->output .= $element . PHP_EOL;
        }

        $this->output .="<$this->elementName";
        
        foreach($this->attributes as $key => $values)
        {
            if(empty($values))
            {
                $this->output .= " $key";
            } else {
                $this->output .= " $key='". implode(' ', $values) ."'";
            }
        }

        $this->output .= ">";

        $arrayObject = new ArrayObject($this->children);
        $iterator = $arrayObject->getIterator();

        while($iterator->valid())
        {
            $current = $iterator->current();
            if($current instanceof AbstractComponent) {
                $this->output .= PHP_EOL . $current->render();
            } else {
                $this->output .= $current;
            }
            $iterator->next();
        }

        $this->output .="</$this->elementName>". PHP_EOL;

        return $this->output;
    }

}
