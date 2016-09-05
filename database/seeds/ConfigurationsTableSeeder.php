<?php

use Illuminate\Database\Seeder;
use Raspberium\Models\Configuration;

class ConfigurationsTableSeeder extends Seeder
{
    /**
     * Create default configurations for thresholds and timing
     *
     * @return void
     */
    public function run()
    {
        $configurations = array(
            [
            'name' => 'temperatureThreshold',
            'setting' => '28'
            ],
            [
                'name' => 'humidityThreshold',
                'setting' => '80'
            ],
            [
                'name' => 'light1On',
                'setting' => '08:00'
            ],
            [
                'name' => 'light1Off',
                'setting' => '19:00'
            ],
            [
                'name' => 'light2On',
                'setting' => '08:01'
            ],
            [
                'name' => 'light2Off',
                'setting' => '19:01'
            ]
        );

        foreach ($configurations as $config)
        {
            Configuration::create([
                'name' => $config['name'],
                'setting' => $config['setting']
            ]);
        }


    }

}
