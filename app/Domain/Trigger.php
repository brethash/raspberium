<?php

namespace Raspberium\Domain;

// TOOD: attach data logger to check functions to record historical data
use Raspberium\Models\Configuration;

class Trigger {

    protected $configurations;

    public function __construct()
    {
        // TODO: require this to be an int within the available GPIO range
        $this->configurations =  Configuration::getData();
    }


    public static function checkHumidity()
    {
        $dht22 = new DHT22(DHT22::getDht22Pin());
        $mistingSystem = new Relay(Relay::getMistingSystemPin());
        $humidity = $dht22->getHumidity();
        $configurations = Trigger::getConfigurations();
        $threshold = $configurations['humidityThreshold'];

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
        $dht22 = new DHT22(DHT22::getDht22Pin());
        $fan = new Relay(Relay::getFanPin());
        $temperature = $dht22->getTemperature();
        $configurations = Trigger::getConfigurations();
        $threshold = $configurations['temperatureThreshold'];

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

    /**
     * @return array
     */
    public function getConfigurations()
    {
        return $this->configurations;
    }
}