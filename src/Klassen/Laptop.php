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
