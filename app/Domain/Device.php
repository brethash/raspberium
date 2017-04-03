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
    public function on()
    {
        $on = $this->setHigh($this->getPinId());

        // Make sure the device turns on
        if ($on) {
            // If we were able to turn the device on, then we can set the device back to on mode
            $this->setState($this->getPinId(), 'on');
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
    public function off()
    {
        $off = $this->setLow($this->getPinId());

        // Make sure the device turns off
        if ($off) {
            // If we were able to turn the device off, then we can set the device back to off mode
            $this->setState($this->getPinId(), 'off');
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
    public function auto()
    {
        $off = $this->setLow($this->getPinId());

        // Make sure the device turns off
        if ($off) {
            // If we were able to turn the device off, then we can set the device back to timer mode
            $this->setState($this->getPinId(), 'auto');
            return true;
        }

        // The device didn't get turned off. Send help.
        return false;
    }

    public function getPump1Pin()
    {
        $device = $this->devices;
        return $device['pump1']['pin'];
    }

    public function getLight1Pin()
    {
        $device = $this->devices;
        return $device['light1']['pin'];
    }

    public function getLight2Pin()
    {
        $device = $this->devices;
        return $device['light2']['pin'];
    }

    public function getFan1Pin()
    {
        $device = $this->devices;
        return $device['fan1']['pin'];
    }

    private function setState($pin, $state)
    {
        $devices = new Devices;
        $devices->setState($pin, $state);
    }
}