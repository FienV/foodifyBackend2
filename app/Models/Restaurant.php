<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Restaurant extends Model
{
    use HasFactory;

    public function city() {
        return $this->belongsTo(City::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function dish() {
        return $this->hasMany(Dish::class);
    }

    public function scopeResto($query)
    {
        // ORDER eager loaden met de dish... en daar de id van opvragen.
        // Die id gaan vergelijken met de id van de user.
        if (Auth::user()->role_id == 3) 
        {
        $currentuser = Auth::user()->getKey();
        return $query->where('user_id', $currentuser);
        } 
    }
}
