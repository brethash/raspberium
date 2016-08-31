<?php

namespace Raspberium\Domain;

// TOOD: attach data logger to check functions to record historical data
class Trigger {

    public static function checkHumidity()
    {
        // TODO: make humidity threshold configurable somewhere!
        $dht22 = new DHT22(DHT22::getDht22Pin());
        $mistingSystem = new Relay(Relay::getMistingSystemPin());
        $humidity = $dht22->getHumidity();
        $threshold = 30;

        // If the humidity is lower than the threshold, turn the misting system on
        if ($humidity < $threshold)
        {
            // TODO: if $on == false then send an alert to someone telling them that their shit wont turn on!
            $on = $mistingSystem->on();
        }
        else
        {
            // Don't turn the pump off until it hits that sweet sweet hysteresis
            if ($humidity == $threshold){
                // Turn the system off. We've reached terminal humidity!
                // TODO: if $off == false then send an alert to someone telling them that their shit wont turn off!
                $off = $mistingSystem->off();
            }

        }

        return true;
    }

    public static function checkTemperature()
    {
        // TODO: make temperature threshold configurable somewhere!
        $dht22 = new DHT22(DHT22::getDht22Pin());
        $fan = new Relay(Relay::getFanPin());
        $temperature = $dht22->getTemperature();
        $threshold = 30;

        if ($temperature > 85)
        {
            $on = $fan->on();
        }
        else
        {
            // Don't turn the pump off until it hits that sweet sweet hysteresis
            if ($temperature == $threshold){
                // Turn the system off. We've reached terminal humidity!
                // TODO: if $off == false then send an alert to someone telling them that their shit wont turn off!
                $off = $fan->off();
            }

        }
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