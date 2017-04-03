<?php

namespace Raspberium\Domain;

use Raspberium\Models\Devices;

class Device extends Gpio
{

    /**
     * Switches the device to the "on" state
     *
     * @return bool
     */
    public function setOn()
    {
        $pinId = $this->getPinId();
        $on = $this->setHigh($pinId);

        // Make sure the device turns on
        if ($on) {
            $this->setStatus($pinId, 'on');
            $this->setState($pinId, 'on');
            return true;
        }

        // The device didn't get turned on. Send help.
        return false;
    }

    /**
     * Switches the device to the "off" state
     *
     * @return bool
     */
    public function setOff()
    {
        $pinId = $this->getPinId();
        $off = $this->setLow($pinId);

        // Make sure the device turns off
        if ($off) {
            $this->setStatus($pinId, 'off');
            $this->setState($this->getPinId(), 'off');
            return true;
        }

        // The device didn't get turned off. Send help.
        return false;
    }

    /**
     * Switches the device to the "auto" state
     *
     * @return bool
     */
    public function setAuto()
    {
        $pinId = $this->getPinId();
        $off = $this->setLow($pinId);

        // Make sure the device turns off
        if ($off) {
            $this->setStatus($pinId, 'off');
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

    public function setStatus($pin, $status)
    {
        $devices = new Devices;
        $devices->setState($pin, $status);
    }
}