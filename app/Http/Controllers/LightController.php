<?php

namespace Raspberium\Http\Controllers;

use Raspberium\Domain\Relay;

class LightController extends Controller
{

    public function light1On()
    {
        $light = new Relay(Relay::getLight1Pin());
        echo $light->on();
    }

    public function light1Off()
    {
        $light = new Relay(Relay::getLight1Pin());
        echo $light->off();
    }

    public function light2On()
    {
        $light = new Relay(Relay::getLight2Pin());
        echo $light->on();
    }

    public function light2Off()
    {
        $light = new Relay(Relay::getLight2Pin());
        echo $light->off();
    }
}
