<?php

namespace Raspberium\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Raspberium\Domain\Trigger;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // Check the humidity every minute
        $schedule->call(function() {
            $trigger = new Trigger;
            $trigger->checkHumidity();
        })->everyMinute();

        // Check the temperature every minute
        $schedule->call(function() {
            $trigger = new Trigger;
            $trigger->checkTemperature();
        })->everyMinute();

        // Turn the lights on at 8am MST
        $schedule->call(function() {
            $trigger = new Trigger;
            $trigger->lightsOn();
        })->dailyAt('8:00')->timezone('America/Denver');

        // Turn the lights off at 9pm MST
        $schedule->call(function() {
            $trigger = new Trigger;
            $trigger->lightsOff();
        })->dailyAt('21:00')->timezone('America/Denver');

        // Record temperature and humidity data every 5 minutes
        $schedule->call(function(){
            $trigger = new Trigger;
            $trigger->recordData();
        })->everyFiveMinutes();

        // Average the daily temperature and humidity data every night at midnight
        $schedule->call(function(){
            $trigger = new Trigger;
            $trigger->averageTodayData();
        })->dailyAt('00:00');

        // Average the weekly temperature and humidity data every Sunday at 12:10am
        $schedule->call(function(){
            $trigger = new Trigger;
            $trigger->averageWeeklyData();
        })->weeklyOn(0,'00:10');

        // Average the monthly temperature and humidity data every month on the 1st at 12:15am
        $schedule->call(function(){
            $trigger = new Trigger;
            $trigger->averageMonthlyData();
        })->monthlyOn(1,'00:15');

        // Average the yearly temperature and humidity data once per year (on a mystery date I guess?)
        $schedule->call(function(){
            $trigger = new Trigger;
            $trigger->averageYearlyData();
        })->yearly();
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
