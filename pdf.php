<?php

use App\Model\PdfFormField;
use mikehaertl\pdftk\Pdf;


require 'vendor/autoload.php';

const project = __DIR__;

// PDF-Formular
$document = project . '/form.pdf';

// PDFTK Server muss zuvor installiert werden (Windows/Mac/Linux)
// https://www.pdflabs.com/tools/pdftk-server/
// nach der Installation muss PhpStorm neu gestartet werden.
$pdf = new Pdf($document);
// Formularfelder holen
$fields = $pdf->getDataFields();

if ($fields === false) {
    $error = $pdf->getError();
} else {
    foreach ($fields as $field) {
        if($formField = PdfFormField::new($field))
            echo "{$formField->getLabel()}:\n{$formField->getValue()}\n\n";
    }
}



