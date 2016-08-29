<?php

namespace Raspberium\Http\Controllers;

use Raspberium\Domain\DHT22;

class SensorController extends Controller
{

    public function index()
    {
        return false;
    }

    public function getTemperature()
    {
        $dht22 = new DHT22($this->getDht22Pin());
        echo $dht22->getTemperature();
    }

    public function getHumidity()
    {
        $dht22 = new DHT22($this->getDht22Pin());
        echo $dht22->getHumidity();
    }

    public function readDht22()
    {
        $dht22 = new DHT22($this->getDht22Pin());
        echo "<pre>";
        var_dump($dht22->read());
        echo "</pre>";
    }

    private function getDht22Pin() {
        return env('DHT22_PIN', false);
    }

}
