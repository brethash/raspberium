<?php

namespace Raspberium\Domain;

class Sensor extends Gpio
{
    /**
     * @return bool|array
     */
    public function read() {
        return $this->readGPIO($this->getPinId());
    }

    /**
     * @return bool|array
     */
    public function write() {
        return $this->setHigh($this->getPinId(), 0);
    }
}