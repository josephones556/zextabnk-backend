<?php

namespace App\Http\Controllers\Secure;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rules\CheckBalance;
use App\Rules\CheckTAC;
use Mail;
use App\Mail\TransactionAlert;
use Auth;
use Cache;
use Carbon\Carbon;
use App\BankList;
use App\Account;

class TransferController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware(['inactive', 'login-disabled', 'admin2']);
    }


    public function transfer(Request $request)
    {
    	# code...
        $user = Auth::user()->load('account');

    	return view('secure.transfer', compact('user'));
    }

    public function get_bank_detail (Request $request) {
        $bank = BankList::where('bank_code', $request->swiftcode)->orWhere('swift', $request->swiftcode)->select(['bank_name', 'swift', 'bank_code', 'country'])->first();
        return collect($bank);
    }

    public function get_account_detail (Request $request) {
        $account = Account::where('account_number', $request->accountNumber)->select(['firstname', 'lastname', ])->first();

        if($account) {
            $user = Auth::user()->load('account');
            if($user->account->account_number != $request->accountNumber) {
                return [
                    'fullname' => $account->firstname .' '. $account->lastname,
                ];
            }
        }

    }

    public function transfer_new(Request $request)
    {
    	# code...

        $user = \Auth::user()->load('account');

        // if ($user->isA('limited') && !Cache::has($user->account->account_number . 'isLimited')) {
        //     # code...
        //     Cache::add($user->account->account_number . 'isLimited', $user->account->account_number, Carbon::parse('last day of ' . date('F')));
        // }        

        if ($user->isA('blocked') || !Cache::has($user->account->account_number . 'isBlocked')) {
            Cache::forever($user->account->account_number . 'isBlocked', Cache::get($user->account->account_number . '_block_message'));
            
            return redirect(route('secure.index'));
        }

        // if (Cache::has($user->account->account_number . 'isLimited') || Cache::has($user->account->account_number . 'isBlocked')) {
        //     # code...
        //     return redirect(route('secure.index'));
        // }

    	$data = $request->validate([ 
            'amount' => ['required', 'numeric', new CheckBalance],
            'bank_name' => 'required|string',   
            'account_number' => 'required|string|alpha_num',
            'account_name' => 'required|string',   
            'swift_code' => 'required|string',	  
            'email' => 'required|string|email',    
            'country' => 'required|string',  
            'transfer_authorization_code' => ['required', new CheckTAC]
    	]);

    	$data['reference'] = strtoupper(str_shuffle(uniqid()));
    	$data['type'] = 'Debit';
    	$data['date'] = now();

    	$transaction = $user->account->transactions()->create($data);

    	$user->account->decrement('balance', $transaction->amount);

        $data['fullName'] = $user->account->firstname . ' ' . $user->account->lastname;

        $data['balance'] = $user->account->balance;

        //Mail::to($user->account->email)->send(new TransactionAlert($data));

        return redirect(route('secure.transactions'));
    }

}
