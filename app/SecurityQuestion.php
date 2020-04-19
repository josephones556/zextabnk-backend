<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SecurityQuestion extends Model
{
    public $fillable = [
        "account_id",
        "question",
        "answer"
    ];

    public function account() {
        return $this->belongsTo(Account::class);
    }
}
