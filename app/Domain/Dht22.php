<?php

namespace Raspberium\Domain;

use Raspberium\Contracts\Gpio;

class DHT22 extends Gpio
{
    
    public function read() {
        // usage: loldht <pin> (<tries>)
        $return_var = 0;
        exec('sudo /usr/bin/loldht', $output, $return_var);
        return $output;
    }

    public function getHumidity()
    {
        $splitValues = $this->getSplitValues();
        $humidity = $splitValues[0];
        $humidityArray = explode('=',$humidity);
        return trim($humidityArray[1]);
    }

    public function getTemperature()
    {
        $splitValues = $this->getSplitValues();
        $temperature = $splitValues[0];
        $temperatureArray = explode('=',$temperature);
        return trim($temperatureArray[1]);
    }

    private function getSplitValues()
    {
        $output = $this->read();
        return explode('%',$output);
    }

    public static function getDht22Pin() {
        return env('DHT22_PIN', false);
    }

}