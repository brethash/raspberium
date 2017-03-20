<?php

namespace Raspberium\Http\Controllers;

use Raspberium\Domain\Bme280;

class SensorController extends Controller
{

    public function index()
    {
        return false;
    }

    public function getTemperature()
    {
        $bme280 = new Bme280;
        echo $bme280->getTemperature();
    }

    public function getHumidity()
    {
        $bme280 = new Bme280;
        echo $bme280->getHumidity();
    }

    public function getPressure()
    {
        $bme280 = new Bme280;
        echo $bme280->getPressure();
    }

    public function getTemperatureHumidityPressureJsonObject()
    {
        $bme280 = new Bme280;
        echo $bme280->getTemperatureHumidityPressureJsonObject();
    }

}
