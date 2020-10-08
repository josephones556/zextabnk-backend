<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Cache;
use Hash;
use Mail;
use App\Transaction;
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
                $user->assign('active');
                Cache::forget($user->account->account_number . 'isBlocked');
                Cache::forget($user->account->account_number . '_block_message');

                break;

            case 'enable-login':

                $user->retract('login-disabled');
                $user->assign('active');
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
                        $user->retract('active');
                        $user->assign('login-disabled');
                        Cache::put($user->account->account_number . '_login_disabled_message', $request->block_message);
                    break;

                    case 'block':
                        $user->retract('active');
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

    public function changeSecurity(Request $request, $id)
    {
        $user = User::with('account')->find($id);

        return view('admin.change_security', ["user" => $user]);
    }

    public function changeSecurityAction(Request $request, $id)
    {
        $request->validate([
            "used_id" => "required|numeric",
            "security_type" => "required|string",
        ]);

        $user = User::with('account')->find($id);

        switch($request->security_type) {
            case "password";
                $request->validate([
                    "new_security" => "required|string",
                ]);

                $new_securify = Hash::make($request->new_security);

                $user->update([
                    "password" => $new_securify
                ]);
            break;

            case "pin";
                $request->validate([
                    "new_security" => "required|numeric|digits_between:4,6|confirmed",
                ]);

                $user->update([
                    "transfer_authorization_code" => $request->new_security
                ]);
            break;
        }
        
        return back()->with("success", "User security has been updated.");
    }

    public function account(Request $request, $id)
    {
        # code...;
        $user = User::with('account')->find($id);

        $user->account->transactions = $user->account->transactions()->orderBy('date', 'desc')->paginate(10);

        return view('admin.account', compact('user'));
    }

    public function account_alter_transaction(Request $request, $id)
    {
        $transaction = Transaction::find($id);
        return view('admin.alter_transaction', [
            'transaction' => $transaction
        ]); 
    }

    public function account_update_transaction(Request $request, $id)
    {
        $data = $request->validate([
            "type" => "required",
            "amount" => "required|numeric",
            "bank_name" => "required",
            "account_number" => "required|numeric",
            "account_name" => "required",
            "swift_code" => "required",
            "country" => "required",
            "date" => "required"
        ]);
        $transaction = Transaction::find($id);
        $transaction->update($data);
        return redirect(route('admin.account', [$transaction->account->user_id]))->with('message', 'Transaction updated successfully.');
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

        cache()->put($data['username'] . '_password', $data['password']);

        $user->assign('inactive');

        return back()->with('message', 'New User: <strong>' . $user->username . '</strong> Password: <strong>' . $data['password'] . '</strong>');
    }
}
