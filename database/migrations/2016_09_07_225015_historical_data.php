<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HistoricalData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historical_data_today', function (Blueprint $table) {
            $table->increments('id');
            $table->float('temperature');
            $table->float('humidity');
            $table->date('recorded_at');
        });

        Schema::create('historical_data_daily', function (Blueprint $table) {
            $table->increments('id');
            $table->float('temperature');
            $table->float('humidity');
            $table->date('recorded_at');
        });

        Schema::create('historical_data_weekly', function (Blueprint $table) {
            $table->increments('id');
            $table->float('temperature');
            $table->float('humidity');
            $table->date('recorded_at');
        });

        Schema::create('historical_data_monthly', function (Blueprint $table) {
            $table->increments('id');
            $table->float('temperature');
            $table->float('humidity');
            $table->date('recorded_at');
        });

        Schema::create('historical_data_yearly', function (Blueprint $table) {
            $table->increments('id');
            $table->float('temperature');
            $table->float('humidity');
            $table->date('recorded_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('historical_data_today');
        Schema::drop('historical_data_daily');
        Schema::drop('historical_data_weekly');
        Schema::drop('historical_data_monthly');
        Schema::drop('historical_data_yearly');
    }
}
