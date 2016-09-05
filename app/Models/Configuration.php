<?php

namespace Raspberium\Models;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    protected $table = 'configurations';
    public $timestamps = false;

    public static function getData() {

        $configurations = Configuration::all();

        return [
            'temperatureThreshold' => $configurations->where('name','temperatureThreshold')->all()->get('setting'),
            'humidityThreshold' => $configurations->where('name','humidityThreshold'),
            'light1On' => $configurations->where('name','light1On'),
            'light1Off' => $configurations->where('name','light1Off'),
            'light2On' => $configurations->where('name','light2On'),
            'light2Off' => $configurations->where('name','light2Off')
        ];


    }

}
