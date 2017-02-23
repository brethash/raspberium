<?php

namespace Raspberium\Http\Controllers;

use Raspberium\Domain\Device;

class FanController extends Controller
{

    public function fansOn()
    {
        $fan = new Device($this->configuration['fan1Pin']);
        echo $fan->on();
    }

    public function fansOff()
    {
        $fan = new Device($this->configuration['fan1Pin']);
        echo $fan->off();
    }

}
