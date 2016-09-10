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
use Illuminate\Support\Facades\Auth;
use Raspberium\Models\Configuration;
use Raspberium\Models\HistoricalDataMonthly;
use Raspberium\Models\HistoricalDataToday;
use Raspberium\Models\HistoricalDataWeekly;
use Raspberium\Models\HistoricalDataYearly;

Route::get('/', function () {
    return view('home');
})->middleware('auth');

Route::get('actions', function() {
    return view('actions');
})->middleware('auth');

Route::get('sensors/temperature', 'SensorController@getTemperature');
Route::get('sensors/humidity', 'SensorController@getHumidity');
Route::get('sensors/temperature-humidity', 'SensorController@getTemperatureHumidityObject');

Route::get('historical', function(){
    $todayData = new HistoricalDataToday;
    $weeklyData = new HistoricalDataWeekly;
    $monthlyData = new HistoricalDataMonthly;
    $yearlyData = new HistoricalDataYearly;
    $data = [
        'today' => $todayData->toGoogleChart(),
        'weekly' => $weeklyData->toGoogleChart(),
        'monthly' => $monthlyData->toGoogleChart(),
        'yearly' => $yearlyData->toGoogleChart()
    ];
    return view('historical',$data);
})->middleware('auth');

Route::get('configuration/update', function(Request $request) {
    return Configuration::saveConfiguration($request->all());
});


Auth::routes();