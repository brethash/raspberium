<?php

namespace Raspberium\Http\Controllers;

use Raspberium\Domain\DHT22;

class SensorController extends Controller
{

    public function index()
    {
        return false;
    }

    public function readDht22()
    {
        $dht22 = new DHT22($this->getDht22Pin());
        echo "test";
        echo $dht22->read();
    }

    private function getDht22Pin() {
        return env('DHT22_PIN', false);
    }

}
