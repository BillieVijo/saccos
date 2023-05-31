<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'member_id',
        'status',
    ];

    public function users()
    {
        return $this->belongsTo(User::class,'member_id');
    }
}
