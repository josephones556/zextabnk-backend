<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'username';
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm(Request $request)
    {
        $user = User::where('username', $request->bankingId)->with('account')->first();

        $profile_picture = $user && isset($user->account->picture) ? $user->account->picture : "";

        return view('auth.login', [
            'bankingId' => $request->bankingId,
            'profile_picture' => $profile_picture
        ]);
    }

    public function redirectTo()
    {
        # code...
        $user = auth()->user();

        if ($user->isAn('inactive')) {
            # code...
            $route = route('secure.register');
        }

        if ($user->isAn('active')) {
            # code...
            $route = route('secure.index');
        }

        if ($user->isAn('admin')) {
            # code...
            $route = route('admin.index');
        }

        return $route;
    }


/*    public function showLoginForm()
    {
        return redirect(route('welcome'));
    }*/
}
