<?php

namespace Raspberium\Models;

use Illuminate\Database\Eloquent\Model;

class HistoricalData extends Model
{
    public static function truncate()
    {
        self::query()->delete();
    }

    public function getAverages()
    {
        $output = new \stdClass();
        $output->temperature = self::query()->get('temperature')->avg();
        $output->humidity = self::query()->get('humidity')->avg();
        return $output;
    }

    public function toGoogleChart()
    {
        $data = self::all();
        $output = [];
        if ($data->count() > 0)
        {
            foreach ($data as $d)
            {
                $output[] = "[new Date(('" . $d['recorded_at'] . "').replace(/-/g, '/'))," . $d['temperature'] . "," . $d['humidity'] ."]";
            }
        }

        return join(',',$output);
    }

}
