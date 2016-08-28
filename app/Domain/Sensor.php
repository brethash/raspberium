<?php

namespace Raspberium\Domain;

use Raspberium\Contracts\Gpio;

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
        return $this->writeGPIO($this->getPinId(), 0);
    }
}