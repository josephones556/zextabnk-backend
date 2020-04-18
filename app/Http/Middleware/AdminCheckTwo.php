<?php

namespace App\Http\Middleware;

use Closure;

class AdminCheckTwo
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
        if ($request->user()->isAn('admin')) {
            return redirect('/admin/index');
        }
        return $next($request);
    }
}
