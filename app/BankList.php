<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankList extends Model
{
    protected $fillable = [
      'bank_name',
      'bank_code',
      'country'
    ];
}
