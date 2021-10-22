<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public static $session;
    public function handle($request, Closure $next , ...$guards)
    {
        if (! $request->session()->get("data")) {
            return redirect(route('login'));
        }else{  
        self::$session = $request->session()->get("data")->id;
        return $next($request);
        }
    }
}
