<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;



class Order extends Model
{
    use HasFactory;

    public function type() {
        return $this->belongsTo(Type::class);
    }

    public function dish() {
        return $this->belongsToMany(Dish::class);
    }

    public function scopeActive($query)
    {
        // ORDER eager loaden met de dish... en daar de id van opvragen.
        // Die id gaan vergelijken met de id van de user.
        if (Auth::user()->role_id == 2 or Auth::user()->role_id == 3) 
        {
        $currentuser = Auth::user()->getKey();
        return $query->where('user_id', $currentuser);
        } 
    }
}
