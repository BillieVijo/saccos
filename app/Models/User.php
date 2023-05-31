<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        
        'email',
        'password',
        'first_name',
        'middle_name',
        'last_name',
        'username',
        'role_id',
        'ban',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsTo(\App\Models\Role::class,'role_id')->latest();
    }

    public function members(){
        return $this->hasMany(\App\Models\Member::class,'user_id');
    }

    public function auditTrails(){
        return $this->hasMany(AuditTrails::class);
    }

    public function loans(){
        return $this->hasMany(Loan::class);
    }

    public function deposits(){
        return $this->hasMany(Loan::class);
    }

    public function shares(){
        return $this->hasMany(Share::class);
    }
}
