<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'member_number',
        'address',
        'share',
        'registered_year',
        'loan_amount',
        'deposit_amount',
        'balance_amount',
    ];

    public function users()
    {
        return $this->belongsTo(\App\Models\User::class,'user_id')->latest();
    }
}
