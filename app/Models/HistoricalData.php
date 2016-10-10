<?php

namespace Raspberium\Models;

use Illuminate\Database\Eloquent\Model;

class HistoricalData extends Model
{
    public static function truncate()
    {
        self::query()->delete();
    }

    /**
     * Returns an object of temperature and humidity averages.
     *
     * @return \stdClass
     */
    public function getAverages()
    {
        $output = new \stdClass();
        $output->temperature = self::query()->get('temperature')->avg();
        $output->humidity = self::query()->get('humidity')->avg();
        return $output;
    }

    /**
     * Converts data from query to a javascript array for Google Charts. giggity.
     *
     * @return string
     */
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
