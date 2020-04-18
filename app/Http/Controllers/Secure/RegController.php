<?php

namespace App\Http\Controllers\Secure;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Transaction;
use App\CreditCard;
use Auth;

class RegController extends Controller
{
    //

    public function __construct()
    {
    	# code...
        $this->middleware('active');
    }


    public function register(Request $request)
    {
        $user = Auth::user()->load('account');

    	return view('secure.register', compact('user'));
    }

    public function register_new(Request $request)
    {
    	$data = $request->validate([
            'firstname' => 'required|string',
            'middlename' => 'required|string',   
            'lastname' => 'required|string',
            'city' => 'required|string',   
            'state' => 'required|string',
            'country' => 'required|string',   
            'email' => 'required|string',
            'phone_number' => 'required|string',   
            'opening' => 'required|string',
            'transactions' => 'required|string',   
            'transfer_authorization_code' => 'required|numeric',
            'account_balance' => 'required|numeric',
            'picture' => ["mimes:jpeg,jpg,gif,bmp,png", "max:2000"], 		
        ]);

        $image = Image::make($request->file('picture'))->resize(200,200)->encode('png');
        $filePath =  'avaters/' . uniqid() . '.png';
        Storage::disk('public')->put($filePath, (string) $image);

        if(Storage::disk('public')->exists($filePath)):

            $i = 0;
            $number = mt_rand(1,9);
            do {
                $number .= mt_rand(0, 9);
            } while(++$i < 14);

            $data['picture'] = $filePath;
            $data['account_number'] = $number;
            $data['opening'] = now()->subYears($data['opening']);
            $data['balance'] = $data['account_balance'];

            $account = $request->user()->account()->create($data);
            $account->generateTransactions($data['transactions'], $request->opening);
            $account->generateCard($data['country']);
            $request->user()->assign('active');
            $request->user()->retract('inactive');
            $request->user()->update([
                'transfer_authorization_code' => $request->transfer_authorization_code
            ]);

            return redirect(route('secure.index'));

        endif;
    }

}
