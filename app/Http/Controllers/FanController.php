<?php

namespace Raspberium\Http\Controllers;

use Raspberium\Domain\Relay;

class FanController extends Controller
{

    public function fansOn()
    {
        $fan = new Relay(Relay::getFanPin());
        echo $fan->on();
    }

    public function fansOff()
    {
        $fan = new Relay(Relay::getFanPin());
        echo $fan->off();
    }

}
