<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// TODO: Refactor out the $data into a service provider to share w/ all views
Route::get('/', function () {
    $data = [
        'temperatureThreshold' => 28,
        'humidityThreshold' => 80,
        'light1on' => '08:00',
        'light1off' => '19:00',
        'light2on' => '08:01',
        'light2off' => '19:01'
    ];

    return view('home', $data);
});

Route::get('actions', function() {
    $data = [
        'temperatureThreshold' => 28,
        'humidityThreshold' => 80,
        'light1on' => '08:00',
        'light1off' => '19:00',
        'light2on' => '08:01',
        'light2off' => '19:01'
    ];

    return view('actions', $data);
});

Route::get('sensors/temperature', 'SensorController@getTemperature');
Route::get('sensors/humidity', 'SensorController@getHumidity');
Route::get('sensors/temperature-humidity', 'SensorController@getTemperatureHumidityObject');