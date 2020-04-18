<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BankList;

class BankController extends Controller
{
    public function new_bank() {
        $swiftcode = str_shuffle(now()->timestamp);
        return view('admin.new_bank', ['swiftcode' => $swiftcode]);
    }

    public function create_bank(Request $request) {
        $data = $request->validate([
            'bankname' => 'required',
            'swiftcode' => 'required',
            'country' => 'required'
        ]);

        BankList::create([
            'bank_name' => $data['bankname'],
            'bank_code' => $data['swiftcode'],
            'country' => $data['country'],
        ]);

        return redirect(route('admin.bank_list'))->with('bank_created', 'Bank with code of '. $data['swiftcode'] . ' has been added.');
    }

    public function bank_list() {
        $banks = BankList::latest()->paginate(25);
        return view('admin.bank_list', ['banks' => $banks]);
    }
}
