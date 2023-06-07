<?php

namespace App\Entity;

class Computer
{

    # Attribute

    private string $producerName;
    private int $ramSize = 4;
    private int $hardDiskSize;
    private int $usbPorts;


    # Getter und Setter

    public function getProducerName(): string
    {
        return $this->producerName;
    }

    public function setProducerName(string $producerName): void
    {
        $this->producerName = $producerName;
    }

    public function getRamSize(): int
    {
        return $this->ramSize;
    }

    public function setRamSize(int $ramSize): void
    {
        $this->ramSize = $ramSize;
    }

    public function getHardDiskSize(): int
    {
        return $this->hardDiskSize;
    }

    public function setHardDiskSize(int $hardDiskSize): void
    {
        $this->hardDiskSize = $hardDiskSize;
    }

    public function getUsbPorts(): int
    {
        return $this->usbPorts;
    }

    public function setUsbPorts(int $usbPorts): void
    {
        $this->usbPorts = $usbPorts;
    }

}

