<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Cache;
use Hash;
use Mail;
use App\Mail\TransactionAlert;

class AccountController extends Controller
{
    //

    public function __construct()
    {

    }

    public function credit(Request $request, $id)
    { 
        # code...;
        $user = User::with('account')->find($id);

        return view('admin.credit', compact('user'));
    }

    public function debit(Request $request, $id)
    {
        # code...;
        $user = User::with('account')->find($id);

        return view('admin.debit', compact('user'));
    }

    public function action(Request $request, $id, $type)
    {
        # code...
        $user = User::with('account')->find($id);

        switch ($type) {
            
            case 'unblock':

                $user->retract('blocked');
                Cache::forget($user->account->account_number . 'isBlocked');
                Cache::forget($user->account->account_number . '_block_message');

                break;

            case 'enable-login':

                $user->retract('login-disabled');
                Cache::forget($user->account->account_number . '_login_disabled_message');

                break;

            case 'terminate':
                    $user->account->creditcard()->delete();
                    $user->account->transactions()->delete();
                    $user->account->card_activities()->delete();
                    $user->account->delete();
                    $user->delete();

                    return redirect(route('admin.index'))->with('success', 'Account deleted successfully.');
                break;

            case 'credit':
                # code...

                $data = $request->validate([ 
                    'amount' => ['required', 'numeric'],
                    'bank_name' => 'required|string',   
                    'account_number' => 'required|string|alpha_num',
                    'account_name' => 'required|string',   
                    'swift_code' => 'required|string',    
                    'email' => 'required|string|email',    
                    'country' => 'required|string',
                    'date' => 'required|string',
                    'credit' => 'required'
                ]);

                $data['reference'] = strtoupper(str_shuffle(uniqid()));
                $data['type'] = 'Credit';


                $transaction = $user->account->transactions()->create($data);

                if ($data['credit'] == 'yes') {
                    # code...

                    $data['fullName'] = $user->account->firstname . ' ' . $user->account->lastname;

                    $user->account->increment('balance', $transaction->amount);

                    $data['balance'] = $user->account->balance;

                    Mail::to($user->account->email)->send(new TransactionAlert($data));
                }

                break;

            case 'debit':
                # code...

                $data = $request->validate([ 
                    'amount' => ['required', 'numeric'],   
                    'action' => 'required',  
                    'country' => 'required|string',
                    'date' => 'required|string',
                    'debit' => 'required'
                ]);

                $transaction = $user->account->card_activities()->create($data);

                if ($data['debit'] == 'yes') {
                    # code...

                    $user->account->decrement('balance', $transaction->amount);

                    $data['fullName'] = $user->account->firstname . ' ' . $user->account->lastname;

                    $user->account->increment('balance', $transaction->amount);

                    $data['balance'] = $user->account->balance;

                    Mail::to($user->account->email)->send(new TransactionAlert($data));

                }

                break;

            case 'general' :

                switch($request->account_action)
                {
                    case 'disable-login': 
                        $user->assign('login-disabled');
                        Cache::put($user->account->account_number . '_login_disabled_message', $request->block_message);
                    break;

                    case 'block':
                        $user->assign('blocked');
                        Cache::put($user->account->account_number . '_block_message', $request->block_message);
                    break;
                }

                break;
            
            default:
                # code...
                break;
        }

        return back();
    }

    public function account(Request $request, $id)
    {
        # code...;
        $user = User::with('account')->find($id);

        $user->account->transactions = $user->account->transactions()->orderBy('date', 'desc')->paginate(10);

        return view('admin.account', compact('user'));
    }

    public function new_account(Request $request)
    {
        # code...

        $data = $request->validate([
            'username' => 'required|string|min:6|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',            
        ]);

        $user = User::create([
            'username' => $data['username'],
            'password' => Hash::make($data['password'])
        ]);

        $user->assign('inactive');

        return back()->with('message', 'New User <strong>' . $user->username . '</strong> Has Been Created WIthis Password <strong>' . $data['password'] . '</strong>');
    }
}
