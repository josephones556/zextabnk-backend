<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
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

        if($user && !$user->isAn('admin') && $user && isset($user->account->picture)):
    
            $profile_picture = $user->account->picture;
            $security_question = $user->account->security_questions()->get()->random();
            cache()->put('security_question_' . $user->id, $security_question, 600);
            $question = $security_question->question;

        else:

            $profile_picture = "";
            $question = "";

        endif;

        return view('auth.login', [
            'question' => $question,
            'bankingId' => $request->bankingId,
            'profile_picture' => $profile_picture
        ]);
    }

        /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        if ($response = $this->authenticated($request, $this->guard()->user())) {
            return $response;
        }

        if(array_key_exists("security_question_answer", (array) $request->all()))
        {
            $security_question = cache('security_question_' . $request->user()->id);

            if($security_question->answer != $request->security_question_answer)
            {
                Auth::logout();
                return back()->withErrors('Security question answer is incorrect.');
            }
        }

        return $request->wantsJson()
                    ? new Response('', 204)
                    : redirect()->intended($this->redirectPath());
    }

    public function redirectTo()
    {
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
}
