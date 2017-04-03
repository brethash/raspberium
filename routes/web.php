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
use Illuminate\Support\Facades\Session;
use Raspberium\Domain\Device;
use Raspberium\Models\Configuration;
use Raspberium\Models\Devices;
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
Route::get('sensors/pressure', 'SensorController@getPressure');
Route::get('sensors/temperature-humidity', 'SensorController@getTemperatureHumidityPressureJsonObject');

// TODO: return proper responses

Route::get('device/{device}/{state}', function($device,$state){

    try {
        // Look up device pin by name
        $devices = Devices::getData();
        $deviceObject = new Device($devices[$device]['pin']);

        if ($state == "on")
        {
            $deviceObject->setOn();

        }
        else if ($state == "auto")
        {
            $deviceObject->setAuto();
        }
        else
        {
            // Set it off!!!
            // https://www.youtube.com/watch?v=k225_q1L9l4
            $deviceObject->setOff();
        }

        echo 'Success';
    }
    catch (Exception $e) {
        // TODO: set response headers to trigger success/failure on ajax handlers
        echo 'Communication with device failed.';
    }

});

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

Route::get('devices/update/pin', function(Request $request) {
    return Devices::setPin($request->input('name'),$request->input('pin'));
});

Route::get('kiosk/{state}', function($state) {
    if ($state != null)
    {
        Session::put('kiosk',$state);
    }

    return "true";
});

Auth::routes();