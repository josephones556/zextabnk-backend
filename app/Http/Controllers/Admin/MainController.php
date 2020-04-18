<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class MainController extends Controller
{
    //

    public function index(Request $request)
    {
        # code...;

        $accounts = User::with('account')->latest()->paginate(15);

        return view('admin.home', compact('accounts'));
    }
}
