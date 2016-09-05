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
            'temperatureThreshold' => $configurations->where('name','temperatureThreshold')->first()['setting'],
            'humidityThreshold' => $configurations->where('name','humidityThreshold')->first()['setting'],
            'light1On' => $configurations->where('name','light1On')->first()['setting'],
            'light1Off' => $configurations->where('name','light1Off')->first()['setting'],
            'light2On' => $configurations->where('name','light2On')->first()['setting'],
            'light2Off' => $configurations->where('name','light2Off')->first()['setting']
        ];


    }

}
