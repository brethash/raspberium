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
        
//        // Check the humidity every minute
//        $schedule->call(Trigger::checkHumidity())->everyMinute();
//
//        // Check the temperature every minute
//        $schedule->call(Trigger::checkTemperature())->everyMinute();
//
//        // Turn the lights on at 8am MST
//        $schedule->call(Trigger::lightsOn())->dailyAt('8:00')->timezone('America/Denver');
//
//        // Turn the lights off at 9pm MST
//        $schedule->call(Trigger::lightsOff())->dailyAt('21:00')->timezone('America/Denver');
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
