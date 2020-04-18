<?php

namespace App\Http\Middleware;

use Closure;
use Bouncer;

class RedirectIfActive
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
        if ($request->user()->isAn('active') && \Route::currentRouteName() == 'secure.register') {
            # code...

            return redirect(route('secure.index'));
        }

        return $next($request);
    }
}
