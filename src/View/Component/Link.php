<?php

namespace App\View\Component;

class Link extends AbstractComponent
{

    public function __construct(string $rel, string $href)
    {
        parent::__construct("link");
        $this->addAttribute('rel',[$rel]);
        $this->addAttribute('href',[$href]);
    }

    public function render(): string
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
