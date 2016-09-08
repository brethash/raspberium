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

}
