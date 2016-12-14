<?php

namespace Raspberium\Http\Controllers;

use Raspberium\Domain\Device;

class LightController extends Controller
{

    public function light1On()
    {
        $light = new Device($this->configuration['light1Pin']);
        echo $light->on();
    }

    public function light1Off()
    {
        $light = new Device($this->configuration['light1Pin']);
        echo $light->off();
    }

    public function light2On()
    {
        $light = new Device($this->configuration['light2Pin']);
        echo $light->on();
    }

    public function light2Off()
    {
        $light = new Device($this->configuration['light2Pin']);
        echo $light->off();
    }
}
