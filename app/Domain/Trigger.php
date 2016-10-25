<?php

namespace Raspberium\Domain;

use Raspberium\Models\Configuration;
use Raspberium\Models\HistoricalDataDaily;
use Raspberium\Models\HistoricalDataMonthly;
use Raspberium\Models\HistoricalDataToday;
use Raspberium\Models\HistoricalDataWeekly;
use Raspberium\Models\HistoricalDataYearly;

class Trigger {

    protected $configurations;

    public function __construct()
    {
        $this->configurations =  Configuration::getData();
    }

    public function checkHumidity()
    {
        /** @var DHT22 $dht22 */
        $dht22 = new DHT22;
        $mistingSystem = new Relay($this->configurations['mistingSystemPin']);
        $humidity = $dht22->getHumidity();
        $threshold = $this->configurations['humidityThreshold'];

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

    public function checkTemperature()
    {
        /** @var DHT22 $dht22 */
        $dht22 = new DHT22;
        $fan = new Relay($this->configurations['fanPin']);
        $temperature = $dht22->getTemperature();
        $threshold = $this->configurations['temperatureThreshold'];

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

    public function lightsOn()
    {
        $light1 = new Relay($this->configurations['light1Pin']);
        $light2 = new Relay($this->configurations['light2Pin']);

        $light1->on();
        $light2->on();
        return true;
    }

    public function lightsOff()
    {
        $light1 = new Relay($this->configurations['light1Pin']);
        $light2 = new Relay($this->configurations['light2Pin']);

        $light1->off();
        $light2->off();
        return true;
    }

    public static function recordData()
    {
        /** @var DHT22 $dht22 */
        $dht22 = new DHT22;
        $dht22Data = $dht22->getTemperatureHumidityObject();
        $historicalDataToday = new HistoricalDataToday;
        $historicalDataToday->temperature = $dht22Data->temperature;
        $historicalDataToday->humidity = $dht22Data->humidity;
        $historicalDataToday->recorded_at = date('Ymd',strtotime('now'));
        $historicalDataToday->save();
    }

    public static function averageTodayData()
    {
        $todayData = HistoricalDataToday::all();
        /** @var HistoricalDataToday $todayData */
        $averages = $todayData->getAverages();
        
        // Add our new average to our weekly 
        $newDailyData = new HistoricalDataDaily;
        $newDailyData->temperature = $averages->temperature;
        $newDailyData->humidity = $averages->humidity;
        $newDailyData->recorded_at = date('Ymd',strtotime('now'));
        $newDailyData->save();

        // Truncate the data from today's record.
        $todayData->truncate();
    }

    public static function averageWeeklyData()
    {
        $dailyData = HistoricalDataDaily::all();
        /** @var HistoricalDataDaily $dailyData */
        $averages = $dailyData->getAverages();

        // Add our new average to our weekly
        $newWeeklyData = new HistoricalDataWeekly;
        $newWeeklyData->temperature = $averages->temperature;
        $newWeeklyData->humidity = $averages->humidity;
        $newWeeklyData->recorded_at = date('Ymd',strtotime('now'));
        $newWeeklyData->save();

        // Truncate the data from the daily record
        $dailyData->truncate();
    }

    public static function averageMonthlyData()
    {
        $weeklyData = HistoricalDataWeekly::all();
        /** @var HistoricalDataWeekly $weeklyData */
        $averages = $weeklyData->getAverages();

        // Add our new average to our weekly
        $newMonthlyData = new HistoricalDataMonthly;
        $newMonthlyData->temperature = $averages->temperature;
        $newMonthlyData->humidity = $averages->humidity;
        $newMonthlyData->recorded_at = date('Ymd',strtotime('now'));
        $newMonthlyData->save();

        // Truncate the data from the weekly record
        $weeklyData->truncate();
    }

    public static function averageYearlyData()
    {
        $monthlyData = HistoricalDataMonthly::all();
        /** @var HistoricalDataMonthly $monthlyData */
        $averages = $monthlyData->getAverages();

        // Add our new average to our weekly
        $newYearlyData = new HistoricalDataYearly;
        $newYearlyData->temperature = $averages->temperature;
        $newYearlyData->humidity = $averages->humidity;
        $newYearlyData->recorded_at = date('Ymd',strtotime('now'));
        $newYearlyData->save();

        // Truncate the data from the monthly record
        $monthlyData->truncate();
    }

    /**
     * @return array
     */
    public function getConfigurations()
    {
        return $this->configurations;
    }
}