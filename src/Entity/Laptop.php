<?php

namespace App\Entity;

class Laptop
{

    private int $memory = 4;
    private string $mainBoard = "AsRock X85D";
    private string $cpu = "Intel i5 6600T";
    private string $display ="IPS 24 Zoll";


    /**
     * @param string $ramSize Größe des Arbeitsspeichers als ganze Zahl in GB.
     */
    public function setMemory (string $ramSize)
    {
        $this->memory = $ramSize;
    }

    /**
     * @param bool $formatAsString Wenn auf true gesetzt, wird die Größe als String formatiert zurückgegeben.
     * @return string|int Gibt die Größe des Arbeitsspeichers in GB zurück.
     */
    public function getMemory (bool $formatAsString = false): string|int
    {
        return ($formatAsString) ? "{$this->memory} GB" : $this->memory;
    }

}
