<?php

namespace App\Http\Middleware;

use Closure;
use Bouncer;

class RedirectIfInactive
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
        if ($request->user()->isAn('inactive') && \Route::currentRouteName() !== 'secure.register') {
            return redirect(route('secure.register'));
        }

        return $next($request);
    }
}
