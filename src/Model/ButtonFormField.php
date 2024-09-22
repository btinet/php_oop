<?php

namespace App\Model;

class ButtonFormField extends PdfFormField
{

    public function __construct(string $name, ?string $value)
    {
        parent::__construct($name, $value);
    }

}