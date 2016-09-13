<?php

namespace Raspberium\Http\Controllers;

use Raspberium\Domain\Relay;

class FanController extends Controller
{

    public function fansOn()
    {
        $fan = new Relay($this->configuration['fanPin']);
        echo $fan->on();
    }

    public function fansOff()
    {
        $fan = new Relay($this->configuration['fanPin']);
        echo $fan->off();
    }

}
