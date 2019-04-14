<?php

namespace App;

use App\Models\Location;
use App\Models\Mechanic;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','location_id', 'email', 'password','token','fbtoken'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function driver() {
        return $this->hasOne(Driver::class);

    }

    public function mechanic() {
        return $this->hasOne(Mechanic::class);

    }

    public function location() {
        return $this->belongsTo(Location::class);

    }
}
