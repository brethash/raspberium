<?php

namespace Raspberium\Models;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $table = 'devices';
    public $timestamps = false;

    /**
     * Returns array of configuration values for the front end to display.
     *
     * @return array
     */
    public static function getData()
    {

        $configurations = Device::all();
        
        return [
            'light1' => $configurations->where('name','light1')->first(),
            'light2' => $configurations->where('name','light2')->first(),
            'pump1' => $configurations->where('name','pump1')->first(),
            'pump2' => $configurations->where('name','pump2')->first(),
            'fan1' => $configurations->where('name','fan1')->first(),
            'fan2' => $configurations->where('name','fan2')->first(),
            'misc1' => $configurations->where('name','misc1')->first(),
            'misc2' => $configurations->where('name','misc2')->first(),
            'dht22' => $configurations->where('name','dht22')->first(),
            'bme280' => $configurations->where('name','bme280')->first()
        ];
        
    }

    /**
     * Sets a device state value via ajax to the database.
     *
     * @param array $request
     * @return string
     */
    public static function setState($request)
    {
        foreach($request as $key => $value)
        {
            Device::where('name', $key)
                ->update(['state' => $value]);

        }

        // TODO: set response headers to trigger success/failure on ajax handlers
        return "true";
    }

}
