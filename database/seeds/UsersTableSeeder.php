<?php

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Raspberium\Models\Configuration;

class UsersTableSeeder extends Seeder
{
    /**
     * Create default configurations for thresholds and timing
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@raspberium.com',
            'password' => bcrypt('secret'),
        ]);

    }

}
