<?php

namespace Raspberium\Domain;

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
    
    
    public static function getMistingSystem1Pin()
    {
        $configuration = Relay::getConfigurations();
        return $configuration['mistingSystem1Pin'];
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

    public static function getFan1Pin()
    {
        $configuration = Relay::getConfigurations();
        return $configuration['fan1Pin'];
    }
}