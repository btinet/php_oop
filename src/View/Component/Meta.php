<?php

namespace App\View\Component;

class Meta extends AbstractComponent
{

    public function __construct(string $name, string $content)
    {
        parent::__construct("meta");
        $this->addAttribute('name',[$name]);
        $this->addAttribute('content',[$content]);           
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

        $this->output .= ">". PHP_EOL;

        return $this->output;
    }

}
