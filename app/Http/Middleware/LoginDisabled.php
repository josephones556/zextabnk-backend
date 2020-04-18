<?php

namespace App\Http\Middleware;

use Cache;
use Closure;

class LoginDisabled
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
        if($request->user()->isA('login-disabled'))
        {
            $account_number = $request->user()->account->account_number;
            \Auth::logout();
            return redirect(route('login'))->with('login-disabled', Cache::get( $account_number . '_login_disabled_message'));
        }

        return $next($request);
    }
}
