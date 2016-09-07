<?php

namespace Raspberium\Providers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Raspberium\Models\Configuration;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     * Sharing is caring
     *
     * @return void
     */
    public function boot()
    {
        // TODO: Implement view composer???
        // Share user data to view
//        var_dump(Auth::user()->toArray());
//       View::share('user',User::all('name')->first()->toArray());
//
//        var_dump(User::all('name')->first()->toArray());

        // Share configuration data to view
        View::share(Configuration::getData());
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
