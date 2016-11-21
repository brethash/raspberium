<?php

namespace Raspberium\Domain;

use Raspberium\Models\Devices;

class Device extends Gpio
{

    /**
     * Switches the device to "on" mode
     *
     * @return bool
     */
    public function on() {
        $on = $this->setHigh($this->getPinId());

        // Make sure the device turns on
        if ($on)
        {
            // If we were able to turn the device on, then we can set the device back to on mode
            $this->setState($this->getPinId(),'on');
            return true;
        }

        // The device didn't get turned on. Send help.
        return false;
    }

    /**
     * Switches the device to "off" mode
     *
     * @return bool
     */
    public function off() {
        $off = $this->setLow($this->getPinId());

        // Make sure the device turns off
        if ($off)
        {
            // If we were able to turn the device off, then we can set the device back to off mode
            $this->setState($this->getPinId(),'off');
            return true;
        }

        // The device didn't get turned off. Send help.
        return false;
    }

    /**
     * Switches the device to "timer" mode
     *
     * @return bool
     */
    public function timer() {
        $off = $this->setLow($this->getPinId());

        // Make sure the device turns off
        if ($off)
        {
            // If we were able to turn the device off, then we can set the device back to timer mode
            $this->setState($this->getPinId(),'timer');
            return true;
        }

        // The device didn't get turned off. Send help.
        return false;
    }
    
    public static function getMistingSystem1Pin()
    {
        $configuration = Device::getConfigurations();
        return $configuration['mistingSystem1Pin'];
    }

    public static function getLight1Pin()
    {
        $configuration = Device::getConfigurations();
        return $configuration['light1Pin'];
    }

    public static function getLight2Pin()
    {
        $configuration = Device::getConfigurations();
        return $configuration['light2Pin'];
    }

    public static function getFan1Pin()
    {
        $configuration = Device::getConfigurations();
        return $configuration['fan1Pin'];
    }
    
    private function setState($pin,$state)
    {
        $devices = new Devices;
        $devices->setState($pin,$state);
    }
}