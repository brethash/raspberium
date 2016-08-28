<?php

namespace Raspberium\Domain;

use Raspberium\Contracts\Gpio;

class Relay extends Gpio
{
    /**
     * @return bool
     */
    public function on() {
        $on = $this->writeGPIO($this->getPinId(), 1);
        if (!$on)
            return false;
        else
            return true;
    }

    /**
     * @return bool
     */
    public function off() {
        $off = $this->writeGPIO($this->getPinId(), 0);

        if (!$off)
            return false;
        else
            return true;
    }
}