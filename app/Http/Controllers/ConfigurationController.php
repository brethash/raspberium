<?php

namespace Raspberium\Http\Controllers;


class ConfigurationController extends Controller
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
