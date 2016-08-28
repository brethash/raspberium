<?php
    
namespace Raspberium\Contracts;

class Gpio
{
    // Integer pin corresponding to the GPIO pin we're trying to talk to
    protected $pinId;

    /**
     * Gpio constructor.
     * @param $pinId
     */
    public function __construct($pinId)
    {
        // TODO: require this to be an int within the available GPIO range
        $this->pinId = $pinId;
    }

    /**
     * @param $pinId
     * @param $status
     * @return bool
     */
    public function writeGPIO($pinId, $status)
    {
        // Set the pin as an input
        system("gpio mode " . $pinId . " in");

        // Send a status to the pin
        $return = 0;
        exec("gpio write " . $pinId . " " . $status, $output, $return);

        // If the return is not 0, there was an error. And that's a bummer.
        if ($return > 0)
            return false;

        return $output;
    }

    /**
     * @param $pinId
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
    public function setPinId($pinId)
    {
        $this->pinId = $pinId;
    }
}