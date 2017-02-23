<?php
    
namespace Raspberium\Domain;

use Raspberium\Contracts\Pin;
use Raspberium\Models\Configuration;
use Raspberium\Models\Devices;

class Gpio implements Pin
{
    // Integer pin corresponding to the GPIO pin we're trying to talk to
    protected $pinId;
    // Configuration data
    protected $configurations;
    // Devices data
    protected $devices;

    /**
     * Gpio constructor.
     * @param $pinId
     */
    public function __construct($pinId)
    {
        // TODO: require this to be an int within the available GPIO range
        $this->pinId = $pinId;
        $this->configurations =  Configuration::getData();
        $this->devices = Devices::getData();
    }

    /**
     * @param int $pinId
     * @return bool
     */
    public function setHigh($pinId)
    {
        // Send a status to the pin
        $return = 0;

        exec("gpio export " . $pinId . " out", $output, $return);

        // If the return is not 0, there was an error. And that's a bummer.
        if ($return > 0)
            return false;

        // GPIO $output is worthless as is.
        return true;
    }

    /**
     * @param int $pinId
     * @return bool
     */
    public function setLow($pinId)
    {
        // Send a status to the pin
        $return = 0;
        exec("gpio export " . $pinId . " in", $output, $return);

        // If the return is not 0, there was an error. And that's a bummer.
        if ($return > 0)
            return false;

        // GPIO $output is worthless as is. 
        return true;
    }

    /**
     * @param int $pinId
     * @return bool
     */
    public function readGPIO($pinId)
    {
        // Set the pin as an output
        system("gpio mode " . $pinId . " out");

        // Send a status to the pin
        $return = 0;
        exec("gpio read " . $pinId, $output, $return);

        // If the return is not 0, there was an error. And that's a bummer.
        if ($return > 0)
            return false;

        return $output;
    }

    /**
     * @return int
     */
    public function getPinId()
    {
        return $this->pinId;
    }

    /**
     * @param int $pinId
     */
    public function setPinId(int $pinId)
    {
        $this->pinId = $pinId;
    }
}