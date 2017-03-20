<?php

namespace Raspberium\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\View;
use Raspberium\Models\Configuration;
use Raspberium\Models\Devices;

class GlobalVariables
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Share configuration data to view
        View::share(Configuration::getData());
        View::share(Devices::getData());

        return $next($request);
    }
}
