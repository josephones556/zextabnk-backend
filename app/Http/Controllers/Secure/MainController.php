<?php

namespace App\Http\Controllers\Secure;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;

class MainController extends Controller
{
    //

    public function __construct()
    {
    	# code...
        $this->middleware(['inactive', 'login-disabled', 'admin2']);
    }

    public function index(Request $request)
    {
    	# code...
        $user = Auth::user()->load('account');
        $credits = $user->account->transactions()->where('type', 'Credit')->orderBy('date', 'desc')->take(10)->get(['amount', 'date']);
        $debits = $user->account->transactions()->where('type', 'Debit')->orderBy('date', 'desc')->take(10)->get(['amount', 'date']);
        $transactions = $user->account->transactions()->orderBy('date', 'desc')->take(10)->get();

        $data = [
            'balance' => $user->account->balance,
            'account_number' => $user->account->account_number,
            'credits' => $credits,
            'debits' => $debits,
            'transactions' => $transactions
        ];

    	return view('secure.index', compact('data', 'user'));
    }

    public function transactions(Request $request)
    {
        # code...
        $user = Auth::user()->load('account');
        $transactions = $user->account->transactions()->orderBy('date', 'desc')->paginate(15);

        return view('secure.transactions', compact('transactions', 'user'));
    }

    public function card(Request $request)
    {
        # code...
        $user = Auth::user()->load('account');

        $card = $user->account->creditcard;

        $activities = $user->account->card_activities()->orderBy('date', 'desc')->take(10)->get();

        return view('secure.card', compact('user', 'card', 'activities'));
    }

    public function card_action(Request $request)
    {
        # code...
        $user = Auth::user()->load('account');

        $account = $user->account;
        $card_options = collect(unserialize($account->card_options));

        $new_card_options = $card_options->put($request->type, $request->action == 'lock' ? 1 : 0);

        $account->card_options = serialize($new_card_options);

        $account->save();
        
        return $account;
    }

    public function invoice(Request $request, $reference)
    {
        # code...
        $user = Auth::user()->load('account');
        $invoice = $user->account->transactions()->where('reference', $reference)->first();

        if (is_null($invoice)) {
            # code...
            return redirect(route('secure.transactions'));
        }

        return view('secure.invoice', compact('invoice', 'user'));
    }
}
