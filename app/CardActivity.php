<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CardActivity extends Model
{
    //
    protected $fillable = [
    	'amount',
    	'country',
    	'date'
    ];

    protected $dates = [
    	'date'
    ];
}
