<?php

namespace Raspberium\Domain;

// TODO: is there a way to know if the relay is already "on"? Get the current state?
class Relay extends Gpio
{

    /**
     * Switches the relay to "on"
     *
     * @return bool
     */
    public function on() {
        $on = $this->setHigh($this->getPinId());
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
        $off = $this->setLow($this->getPinId());

        if (!$off)
            return false;
        else
            return true;
    }
    
    public static function getMistingSystemPin()
    {
        $configuration = Relay::getConfigurations();
        return $configuration['mistingSystemPin'];
    }

    public static function getLight1Pin()
    {
        $configuration = Relay::getConfigurations();
        return $configuration['light1Pin'];
    }

    public static function getLight2Pin()
    {
        $configuration = Relay::getConfigurations();
        return $configuration['light2Pin'];
    }

    public static function getFanPin()
    {
        $configuration = Relay::getConfigurations();
        return $configuration['fanPin'];
    }
}