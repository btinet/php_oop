<?php

namespace App\Model;

class TextFormField extends PdfFormField
{

    public function __construct(string $name, ?string $value)
    {
        parent::__construct($name, $value);
    }

}