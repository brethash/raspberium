<?php

namespace Raspberium\Domain;

use Raspberium\Contracts\Gpio;

class DHT22 extends Gpio
{

    /**
     * Reads the output from the loldht script
     *
     * @return array
     */
    public function read() {
        // usage: loldht <pin> (<tries>)
        $return_var = 0;
        exec('sudo /usr/bin/loldht', $output, $return_var);
        return $output;
    }

    /**
     * Parses the humidity into a double from the getSplitValues string
     *
     * @return string
     */
    public function getHumidity()
    {
        $splitValues = $this->getSplitValues();
        $humidity = $splitValues[0];
        $humidityArray = explode('=',$humidity);
        return trim($humidityArray[1]);
    }

    /**
     * Parses the temperature into a double from the getSplitValues string
     *
     * @return mixed
     */
    public function getTemperature()
    {
        $splitValues = $this->getSplitValues();
        $temperature = $splitValues[1];
        $temperatureArray = explode('=',$temperature);
        return trim(str_replace('*C','',$temperatureArray[1]));
    }

    /**
     * Splits the read value from the loldht script for parsing
     *
     * @return string
     */
    private function getSplitValues()
    {
        // TODO: check if readValue is a valid array
        $readValue = $this->read();
        $output = array_pop($readValue);
        return explode('%',$output);
    }

    /**
     * Gets the configued DHT22 pin number
     *
     * @return integer
     */
    public static function getDht22Pin() {
        return env('DHT22_PIN', false);
    }

}