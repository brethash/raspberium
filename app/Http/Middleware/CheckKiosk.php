<?php

namespace Raspberium\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
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
        $key = "kiosk";
        $kioskMode = false;

        // Get all request params
        $params = $request->all();

        // If there are no request params found but the kiosk session key exists, we're still in kiosk mode
        if (!count($params) && Session::has($key))
        {
            // If our session variable is true, set kioskMode to true
            $sessionKiosk = Session::get($key);
            if ($sessionKiosk == "true")
            {
                $kioskMode = true;
            }

        }

        // If there are request params
        if (count($params))
        {
            // And one of them happens to be kiosk and its true
            if ($request->kiosk == "true")
            {
                // Setup kiosk mode!
                Session::put($key, "true");
            }
            else if ($request->kiosk == "false")
            {
                // We no longer want kiosk mode enabled
                Session::put($key, "false");
            }

        }

        if ($kioskMode) {
            View::share(array('kiosk' => true));
        }
        
        return $next($request);
    }
}
