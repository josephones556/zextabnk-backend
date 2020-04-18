<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreditCard extends Model
{
    //
    protected $fillable = [
		'card_number',
		'expiry',
		'cvc',
		'name',
    ];
}
