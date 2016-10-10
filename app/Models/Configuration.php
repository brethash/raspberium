<?php

namespace Raspberium\Models;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    protected $table = 'configurations';
    public $timestamps = false;

    /**
     * Returns array of configuration values for the front end to display.
     *
     * @return array
     */
    public static function getData()
    {

        $configurations = Configuration::all();

        return [
            'temperatureThreshold' => $configurations->where('name','temperatureThreshold')->first()['setting'],
            'humidityThreshold' => $configurations->where('name','humidityThreshold')->first()['setting'],
            'light1On' => $configurations->where('name','light1On')->first()['setting'],
            'light1Off' => $configurations->where('name','light1Off')->first()['setting'],
            'light2On' => $configurations->where('name','light2On')->first()['setting'],
            'light2Off' => $configurations->where('name','light2Off')->first()['setting'],
            'light1Pin' => $configurations->where('name','light1Pin')->first()['setting'],
            'light2Pin' => $configurations->where('name','light2Pin')->first()['setting'],
            'fanPin' => $configurations->where('name','fanPin')->first()['setting'],
            'mistingSystemPin' => $configurations->where('name','mistingSystemPin')->first()['setting'],
            'dht22Pin' => $configurations->where('name','dht22Pin')->first()['setting'],
        ];
        
    }

    /**
     * Save a configuration value via ajax to the database.
     *
     * @param array $request
     * @return string
     */
    public static function saveConfiguration($request)
    {
        foreach($request as $key => $value)
        {
            Configuration::where('name', $key)
                ->update(['setting' => $value]);

        }

        // TODO: set response headers to trigger success/failure on ajax handlers
        return "true";
    }

}
