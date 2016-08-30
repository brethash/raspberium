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

Route::get('/', function () {
    return view('home');
});

Route::get('actions', function() {
    return view('actions');
});

Route::get('sensors/temperature', 'SensorController@getTemperature');
Route::get('sensors/humidity', 'SensorController@getHumidity');
Route::get('sensors/temperature-humidity', 'SensorController@getTemperatureHumidityObject');
