<?php

namespace App\Model;

use Error;
use Transliterator;

abstract class PdfFormField implements FormFieldInterface
{

    private string $name;
    private string $label;
    private ?string $value;

    public function __construct(string $name, ?string $value = null)
    {
        $this->name  = $name;
        $this->label = Transliterator::createFromRules($this->getRules())->transliterate($name);
        $this->value = trim($value);
    }

    private function getRules(): string
    {
        return <<<RULES
        :: Any-Latin;
        :: NFD;
        :: [:Nonspacing Mark:] Remove;
        :: NFC;
        :: [^-[:^Punctuation:]] Remove;
        :: Lower();
        [:^L:] { [-] > ;
        [-] } [:^L:] > ;
        [-[:Separator:]]+ > '-';
        RULES;
    }

    public static function new(array $formField): ?FormFieldInterface
    {
        if(array_key_exists('FieldValue',$formField)) {
            return match ($formField['FieldType']) {
                "Text" => new TextFormField($formField['FieldName'],$formField['FieldValue']),
                "Button" => new ButtonFormField($formField['FieldName'],$formField['FieldValue']),
            };
        }
        return null;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function setLabel(string $label): void
    {
        $this->label = $label;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(?string $value): void
    {
        $this->value = $value;
    }

}