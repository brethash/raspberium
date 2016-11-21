<?php

namespace Raspberium\Models;

use Illuminate\Database\Eloquent\Model;

class Devices extends Model
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

        $devices = Devices::all();
        
        return [
            'light1' => $devices->where('name','light1')->first(),
            'light2' => $devices->where('name','light2')->first(),
            'pump1' => $devices->where('name','pump1')->first(),
            'pump2' => $devices->where('name','pump2')->first(),
            'fan1' => $devices->where('name','fan1')->first(),
            'fan2' => $devices->where('name','fan2')->first(),
            'misc1' => $devices->where('name','misc1')->first(),
            'misc2' => $devices->where('name','misc2')->first(),
            'dht22' => $devices->where('name','dht22')->first(),
            'bme280' => $devices->where('name','bme280')->first()
        ];
        
    }

    /**
     * Sets a device state value via ajax to the database.
     *
     * @param $pin integer
     * @param $state string
     * @return string
     */
    public function setState($pin,$state)
    {
            Devices::where('pin', $pin)
                ->update(['state' => $state]);


        // TODO: set response headers to trigger success/failure on ajax handlers
        return "true";
    }

}
