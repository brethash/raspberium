<?php

use Illuminate\Database\Seeder;
use Raspberium\Models\Devices;

class DevicesTableSeeder extends Seeder
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
                'name' => 'light1',
                'niceName' => 'Day Light',
                'pin' => '3',
                'state' => 'timer',
                'status' => 'on'
            ],
            [
                'name' => 'light2',
                'niceName' => 'Night Light',
                'pin' => '4',
                'state' => 'timer',
                'status' => 'on'
            ],
            [
                'name' => 'pump1',
                'niceName' => 'Misting Pump',
                'pin' => '6',
                'state' => 'timer',
                'status' => 'on'
            ],
            [
                'name' => 'pump2',
                'niceName' => 'Drip Wall Pump',
                'pin' => '28',
                'state' => 'timer',
                'status' => 'off'
            ],
            [
                'name' => 'fan1',
                'niceName' => 'Exhaust Fan',
                'pin' => '5',
                'state' => 'timer',
                'status' => 'on'
            ],
            [
                'name' => 'fan2',
                'niceName' => 'Intake Fan',
                'pin' => '28',
                'state' => 'timer',
                'status' => 'off'
            ],
            [
                'name' => 'misc1',
                'niceName' => 'Other Device 1',
                'pin' => '28',
                'state' => 'timer',
                'status' => 'off'
            ],
            [
                'name' => 'misc2',
                'niceName' => 'Other Device 2',
                'pin' => '28',
                'state' => 'timer',
                'status' => 'off'
            ],
            [
                'name' => 'bme280',
                'niceName' => 'BME280',
                'pin' => '0',
                'state' => 'on',
                'status' => 'off'
            ],
        );

        foreach ($configurations as $config)
        {
            Devices::create([
                'name' => $config['name'],
                'niceName' => $config['niceName'],
                'pin' => $config['pin'],
                'state' => $config['state'],
                'status' => $config['status']
            ]);
        }


    }

}
