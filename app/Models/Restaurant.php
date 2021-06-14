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
        if (Auth::user()->role_id == 3) 
        {
        $currentuser = Auth::user()->getKey();
        return $query->where('user_id', $currentuser);
        } 
    }
}
