<?php

namespace Raspberium\Domain;

use Illuminate\Support\Facades\Cache;

class DHT22 extends Gpio
{

    /**
     * DHT22 constructor.
     *
     * Simply sets the DHT22 pin. Noice.
     */
    public function __construct()
    {
        parent::__construct($this->getDht22Pin());
    }
    
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
        $dht22 = Cache::get('dht22');

        if ($dht22 == null){
            // DHT22 reading doesn't exist in the cache
            $output = new \stdClass();
            $output->humidity = $this->getHumidity();
            $output->temperature = $this->getTemperature();
            Cache::put('dht22', $dht22, 0.13);
        }

        return $dht22;

    }

    /**
     * Returns a convenient json object with the temperature and humidity, ripe for parsing!
     *
     * @return string
     */
    public function getTemperatureHumidityJsonObject()
    {
        $dht22 = Cache::get('dht22json');

        if ($dht22 == null){
            // DHT22 reading doesn't exist in the cache
            $output = new \stdClass();
            $output->humidity = $this->getHumidity();
            $output->temperature = $this->getTemperature();
            $dht22 = json_encode($output);
            Cache::put('dht22json', $dht22, 0.13);
        }

        return $dht22;

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
    public function getDht22Pin() {
        $configuration = $this->getConfigurations();
        return $configuration['dht22Pin'];
    }

}