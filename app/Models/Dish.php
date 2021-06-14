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
        if (Auth::user()->role_id == 3) 
        {
        $currentuser = Auth::user()->getKey();
        return $query->where('restaurant_id', $currentuser);
        } 
    }
}
