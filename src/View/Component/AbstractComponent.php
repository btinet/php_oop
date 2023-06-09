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

    /**
     * <p>
     * Fügt dem aktuellen Element ein Attribut hinzu. Ist der zweite Parameter <b>null</b>, wird das Attribut alleinstehend
     * ohne Zuweisung hinzugefügt.
     * </p>
     *
     * <code>addAttribute("disabled")</code> erzeugt: <em>disabled</em><br>
     * <code>addAttribute("disabled",["true"])</code> erzeugt: <em>disabled="true"</em><br>
     *
     * @param string $key Attribut, das dem aktuellen Element hinzugefügt werden soll.
     * @param array $values Liste mit Attributwerten, die dem Attribut hinzugefügt werden sollen.
     */
    public function addAttribute(string $key, array $values = array()): void
    {
        if(key_exists($key,$this->attributes))
        {
            $this->attributes[$key] = array_merge($this->attributes[$key],$values);
        } else {
            $this->attributes[$key] = $values;
        }  
    }

    /**
     * Fügt dem aktuellen Element beliebig viele CSS-Klassen hinzu.
     * @param array $values Liste mit CSS-Klassennamen, die auf das aktuelle Element angewendet werden sollen.
     */
    public function addStyle(array $values)
    {
        if(key_exists("class",$this->attributes))
        {
            $this->attributes["class"] = array_merge($this->attributes["class"],$values);
        } else {
            $this->attributes["class"] = $values;
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
