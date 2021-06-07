<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Dish extends Model
{
    use HasFactory;

    public function restaurant() {
        return $this->belongsTo(Restaurant::class);
    }

    public function order() {
        return $this->belongsToMany(Order::class);
    }
  
    public function scopeDish($query)
    {
        // ORDER eager loaden met de dish... en daar de id van opvragen.
        // Die id gaan vergelijken met de id van de user.
        if (Auth::user()->role_id == 3) 
        {
        $currentuser = Auth::user()->getKey();
        return $query->where('restaurant_id', $currentuser);
        } 
    }
}
