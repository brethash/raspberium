<?php

namespace Raspberium\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\View;
use Raspberium\Models\Configuration;

class GlobalConfiguration
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Share configuration data to view
        $configuration = new Configuration;
        View::share($configuration->getData());

        return $next($request);
    }
}
