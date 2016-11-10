<?php

namespace Raspberium\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\View;

class CheckKiosk
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
        if ($request->kiosk == "true")
        {
            View::share(array('kiosk' => true));
        }

        return $next($request);
    }
}
