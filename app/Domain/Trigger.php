<?php

namespace Raspberium\Domain;

class Trigger {

    public static function checkHumidity()
    {
        // TODO: make humidity threshold configurable somewhere!
        $dht22 = new DHT22(DHT22::getDht22Pin());
        $mistingSystem = new Relay(Relay::getMistingSystemPin());

        // If the humidity is lower than the threshold, turn the misting system on
        if ($dht22->getHumidity() < 80)
        {
            // TODO: if $on == false then send an alert to someone telling them that their shit wont turn on!
            $on = $mistingSystem->on();
        }
        else
        {
            // Turn the system off. We've reached terminal humidity!
            // TODO: if $off == false then send an alert to someone telling them that their shit wont turn off!
            $off = $mistingSystem->off();
        }

        return true;
    }

    public static function lightsOn()
    {
        $light1 = new Relay(Relay::getLight1Pin());
        $light2 = new Relay(Relay::getLight2Pin());

        $light1->on();
        $light2->on();
        return true;
    }

    public static function lightsOff()
    {
        $light1 = new Relay(Relay::getLight1Pin());
        $light2 = new Relay(Relay::getLight2Pin());

        $light1->off();
        $light2->off();
        return true;
    }
}