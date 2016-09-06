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

use Illuminate\Http\Request;
use Raspberium\Models\Configuration;

Route::get('/', function () {
    return view('home', Configuration::getData());
});

Route::get('actions', function() {
    return view('actions', Configuration::getData());
});

Route::get('sensors/temperature', 'SensorController@getTemperature');
Route::get('sensors/humidity', 'SensorController@getHumidity');
Route::get('sensors/temperature-humidity', 'SensorController@getTemperatureHumidityObject');

Route::get('configuration/update', function(Request $request) {
    return Configuration::saveConfiguration($request->all());
});