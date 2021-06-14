<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends \TCG\Voyager\Models\User
{
    use HasFactory, Notifiable;

    public function city() {
        return $this->belongsTo(City::class);
    }

    public function order() {
        return $this->hasMany(Order::class);
    }

    public function restaurant() {
        return $this->hasMany(Restaurant::class);
    }

      
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'city_id',
        'address'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeUser($query)
    {
        if (Auth::user()->role_id == 2 or Auth::user()->role_id == 3) 
        {
        $currentuser = Auth::user()->getKey();
        return $query->where('id', $currentuser);
        } 
    }
}
