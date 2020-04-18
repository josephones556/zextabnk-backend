<?php

namespace App\Http\Controllers\Secure;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class ProfileController extends Controller
{
    //

    public function __construct()
    {
    	# code...
        $this->middleware(['inactive', 'login-disabled', 'admin2']);
    }

    
    public function account()
    {
    	# code...
        $user = Auth::user()->load('account');

    	return view('secure.account', compact('user'));
    }
}
