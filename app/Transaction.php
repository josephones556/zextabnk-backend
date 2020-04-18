<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    protected $fillable = [
		'amount',
		'reference',
		'type',
		'bank_name',
		'account_number',
		'account_name',
		'swift_code',
		'date',
		'country',
		'email'
    ];    

    protected $dates = [
		'date'
    ];
}
