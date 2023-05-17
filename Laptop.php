<?php

class Laptop
{

    private $arbeitsSpeicher = "4 GB";
    private $mainBoard = "AsRock X85D";
    private $cpu = "Intel i5 6600T";
    private $display ="IPS 24 Zoll";


    public function setArbeitsSpeicher (string $ramSize)   // Methodenkopf
    {
        $this->arbeitsSpeicher = $ramSize;
    }

    public function getArbeitsSpeicher ()
    {
        return $this->arbeitsSpeicher;
    }

}

$macBook = new Laptop();

// Dem Attribut "arbeitsSpeicher" den Wer '4 GB' zuweisen

// Ausgabe:
print $macBook->getArbeitsSpeicher();

$macBook->setArbeitsSpeicher("16 GB");

// Ausgabe:
print $macBook->getArbeitsSpeicher();
