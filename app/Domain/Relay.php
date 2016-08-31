<?php

namespace Raspberium\Domain;

use Raspberium\Contracts\Gpio;


// TODO: is there a way to know if the relay is already "on"? Get the current state?
class Relay extends Gpio
{
    /**
     * Switches the relay to "on"
     *
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
     * Switches the relay to "off"
     *
     * @return bool
     */
    public function off() {
        $off = $this->writeGPIO($this->getPinId(), 0);

        if (!$off)
            return false;
        else
            return true;
    }
    
    public static function getMistingSystemPin()
    {
        return env('MISTING_SYSTEM_PIN', false);
    }

    public static function getLight1Pin()
    {
        return env('LIGHT_1_GPIO_PIN', false);
    }

    public static function getLight2Pin()
    {
        return env('LIGHT_2_GPIO_PIN', false);
    }

    public static function getFanPin()
    {
        return env('FAN_GPIO_PIN', false);
    }
}