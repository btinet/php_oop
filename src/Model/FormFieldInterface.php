<?php

namespace App\Model;

interface FormFieldInterface
{
    public function getName(): string;
    public function getLabel(): string;
    public function getValue(): ?string;
}