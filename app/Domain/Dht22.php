<?php

namespace Raspberium\Domain;

use Raspberium\Contracts\Gpio;

// TODO: Figure out how to avoid request collision w/ loldht. Something is making it hella slow. 3-9s response times???
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
        if ($splitValues)
        {
            $humidity = $splitValues[0];
            $humidityArray = explode('=',$humidity);
            return trim($humidityArray[1]);
        }
        return false;
    }

    /**
     * Parses the temperature into a double from the getSplitValues string
     *
     * @return mixed
     */
    public function getTemperature()
    {
        $splitValues = $this->getSplitValues();
        if ($splitValues)
        {
            $temperature = $splitValues[1];
            $temperatureArray = explode('=',$temperature);
            return trim(str_replace('*C','',$temperatureArray[1]));
        }
        return false;
    }

    /**
     * Returns a convenient json object with the temperature and humidity, ripe for parsing!
     *
     * @return string
     */
    public function getTemperatureHumidityObject()
    {
        $output = new \stdClass();
        $output->humidity = $this->getHumidity();
        $output->temperature = $this->getTemperature();
        return json_encode($output);
    }

    /**
     * Splits the read value from the loldht script for parsing
     *
     * @return boolean|array
     */
    private function getSplitValues()
    {
        // TODO: check if readValue is a valid array
        $readValue = $this->read();
        if (!empty($readValue))
        {
            $output = array_pop($readValue);
            return explode('%',$output);
        }
        return false;
    }

    /**
     * Gets the configured DHT22 pin number
     *
     * @return integer
     */
    public static function getDht22Pin() {
        return env('DHT22_PIN', false);
    }

}