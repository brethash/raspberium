<?php

namespace Raspberium\Domain;

use Raspberium\Models\Configuration;
use Raspberium\Models\Devices;
use Raspberium\Models\HistoricalDataDaily;
use Raspberium\Models\HistoricalDataMonthly;
use Raspberium\Models\HistoricalDataToday;
use Raspberium\Models\HistoricalDataWeekly;
use Raspberium\Models\HistoricalDataYearly;

// TODO: Refactor checkTemperature and checkHumidity and maybe the lights
class Trigger
{

    protected $configurations;
    protected $devices;

    public function __construct()
    {
        $this->configurations = Configuration::getData();
        $this->devices = Devices::getData();
    }

    public function checkHumidity()
    {
        /** @var Bme280 $bme280 */
        $bme280 = new Bme280;
        $pump1 = $this->devices['pump1'];
        $mistingSystem = new Device($pump1['pin']);
        $humidity = $bme280->getHumidity();
        $threshold = $this->configurations['humidityThreshold'];
        $state = $pump1['state'];

        // If we're in auto mode, lets check out headlights on this automobile
        if ($state == 'auto') {
            // If the humidity is lower than the threshold, turn the misting system on
            if ($humidity < $threshold) {
                // TODO: if $on == false then send an alert to someone telling them that their shit wont turn on!
                $on = $mistingSystem->on();
            } else {
                // Turn the system off. We've reached terminal humidity!
                // TODO: if $off == false then send an alert to someone telling them that their shit wont turn off!
                $off = $mistingSystem->off();
            }
        }


        return true;
    }

    public function checkTemperature()
    {
        /** @var Bme280 $bme280 */
        $bme280 = new Bme280();
        $fan1 = $this->devices['fan1'];
        $fan = new Device($fan1['pin']);
        $temperature = $bme280->getTemperature();
        $threshold = $this->configurations['temperatureThreshold'];
        $state = $fan1['state'];

        // If we're in auto mode, lets check out headlights on this automobile
        if ($state == 'auto') {
            if ($temperature > $threshold) {
                // TODO: if $on == false then send an alert to someone telling them that their shit wont turn on!
                $on = $fan->on();
            } else {
                // Turn the system off. We've reached terminal humidity!
                // TODO: if $off == false then send an alert to someone telling them that their shit wont turn off!
                $off = $fan->off();
            }
        }

        return true;
    }

    public function lightsOn()
    {
        $light1 = $this->devices['light1'];
        $light1Device = new Device($light1['pin']);

        $light2 = $this->devices['light2'];
        $light2Device = new Device($light2['pin']);

        if ($light1['state'] == 'timer') {
            $light1Device->on();
        }

        if ($light2['state'] == 'timer') {
            $light2Device->on();
        }

        return true;
    }

    public function lightsOff()
    {

        $light1 = $this->devices['light1'];
        $light1Device = new Device($light1['pin']);

        $light2 = $this->devices['light2'];
        $light2Device = new Device($light2['pin']);

        if ($light1['state'] == 'timer') {
            $light1Device->off();
        }

        if ($light2['state'] == 'timer') {
            $light2Device->off();
        }

        return true;
    }

    public static function recordData()
    {
        /** @var Bme280 $bme280 */
        $bme280 = new Bme280;
        $historicalDataToday = new HistoricalDataToday;
        $historicalDataToday->temperature = $bme280->getTemperature();
        $historicalDataToday->humidity = $bme280->getHumidity();
        $historicalDataToday->recorded_at = date('Y-m-d H:i:s', strtotime('now'));
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
        $newDailyData->recorded_at = date('Y-m-d', strtotime('now'));
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
        $newWeeklyData->recorded_at = date('Y-m-d', strtotime('now'));
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
        $newMonthlyData->recorded_at = date('Y-m-d', strtotime('now'));
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
        $newYearlyData->recorded_at = date('Y-m-d', strtotime('now'));
        $newYearlyData->save();

        // Truncate the data from the monthly record
        $monthlyData->truncate();
    }

}