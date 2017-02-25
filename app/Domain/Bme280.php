<?php

namespace Raspberium\Domain;

use Illuminate\Support\Facades\Cache;

class Bme280
{

    /**
     * BME280 constructor.
     *
     * Simply sets the BME280 pin. Saweeeeet.
     */
    public function __construct()
    {
        // The BME280 communicates via the I2C interface, so we don't even NEED to specify a pin!
    }

    /**
     * Gets the humidity value from the BME280
     *
     * @return string
     */
    public function getHumidity()
    {

        $bme280 = Cache::get('bme280Humidity');

        if ($bme280 == null)
        {
            $return_var = 0;
            exec('sudo python ' . $this->getBme280BasePath() . 'humidity.py', $output, $return_var);
            // TODO: check if this is a valid number value before caching it
            if ($return_var == 0) {
                Cache::put('bme280Humidity',$output, 0.0333);
                return $output[0];
            }

        }
        return false;

    }

    /**
     * Get the temperature value from the BME280
     *
     * @return mixed
     */
    public function getTemperature()
    {

        $bme280 = Cache::get('bme280Temperature');

        if ($bme280 == null)
        {
        echo "<pre>";
            $return_var = 0;
            exec('sudo python ' . $this->getBme280BasePath() . 'temperature.py', $output, $return_var);
            // TODO: check if this is a valid number value before caching it
            if ($return_var == 0) {
                Cache::put('bme280Temperature',$output, 0.0333);
                return $output[0];
            }

        }
        return false;

    }

    /**
     * Gets the humidity value from the BME280
     *
     * @return string
     */
    public function getPressure()
    {

        $bme280 = Cache::get('bme280Pressure');

        if ($bme280 == null)
        {
            $return_var = 0;
            exec('sudo python ' . $this->getBme280BasePath() . 'pressure.py', $output, $return_var);
            // TODO: check if this is a valid number value before caching it

            if ($return_var == 0) {
                Cache::put('bme280Pressure',$output, 0.0333);
                return $output[0];
            }

        }
        return false;

    }

    /**
     * Returns a convenient json object with the temperature and humidity, ripe for parsing!
     *
     * @return string
     */
    public function getTemperatureHumidityPressureJsonObject()
    {
        $bme280json = Cache::get('bme280json');

        if ($bme280json == null)
        {
            // bme280 reading doesn't exist in the cache
            $output = new \stdClass();
            $output->humidity = $this->getHumidity();
            $output->temperature = $this->getTemperature();
            $output->pressure = $this->getPressure();
            $bme280json = json_encode($output);

            // BME280 datasheet claims a 1s response time. So we'll set the cache to 2s to avoid collisions
            Cache::put('bme280json', $bme280json, 0.0333);
        }

        return $bme280json;

    }

    private function getBme280BasePath()
    {
        return $_SERVER['DOCUMENT_ROOT'] . '/bme280/';
    }

}