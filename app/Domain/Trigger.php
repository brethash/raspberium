<?php

namespace Raspberium\Domain;

use Raspberium\Models\Configuration;
use Raspberium\Models\Devices;
use Raspberium\Models\HistoricalDataDaily;
use Raspberium\Models\HistoricalDataMonthly;
use Raspberium\Models\HistoricalDataToday;
use Raspberium\Models\HistoricalDataWeekly;
use Raspberium\Models\HistoricalDataYearly;

class Trigger {

    protected $configurations;
    protected $devices;

    public function __construct()
    {
        $this->configurations =  Configuration::getData();
        $this->devices = Devices::getData();
    }

    public function checkHumidity()
    {
        /** @var DHT22 $dht22 */
        $dht22 = new DHT22;
        $mistingSystem = new Device($this->devices['pump1']['pin']);
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
            // Turn the system off. We've reached terminal humidity!
            // TODO: if $off == false then send an alert to someone telling them that their shit wont turn off!
            $off = $mistingSystem->off();
        }

        return true;
    }

    public function checkTemperature()
    {
        /** @var DHT22 $dht22 */
        $dht22 = new DHT22;
        $fan = new Device($this->devices['fan1']['pin']);
        $temperature = $dht22->getTemperature();
        $threshold = $this->configurations['temperatureThreshold'];

        if ($temperature > $threshold)
        {
            // TODO: if $on == false then send an alert to someone telling them that their shit wont turn on!
            $on = $fan->on();
        }
        else
        {
            // Turn the system off. We've reached terminal humidity!
            // TODO: if $off == false then send an alert to someone telling them that their shit wont turn off!
            $off = $fan->off();
        }

        return true;
    }

    public function lightsOn()
    {
        $light1 = new Device($this->devices['light1']['pin']);
        $light2 = new Device($this->devices['light2']['pin']);

        $light1->on();
        $light2->on();
        return true;
    }

    public function lightsOff()
    {
        $light1 = new Device($this->devices['light1']['pin']);
        $light2 = new Device($this->devices['light2']['pin']);

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
        $historicalDataToday->recorded_at = date('Y-m-d H:i:s',strtotime('now'));
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
        $newDailyData->recorded_at = date('Y-m-d',strtotime('now'));
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
        $newWeeklyData->recorded_at = date('Y-m-d',strtotime('now'));
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
        $newMonthlyData->recorded_at = date('Y-m-d',strtotime('now'));
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
        $newYearlyData->recorded_at = date('Y-m-d',strtotime('now'));
        $newYearlyData->save();

        // Truncate the data from the monthly record
        $monthlyData->truncate();
    }

}