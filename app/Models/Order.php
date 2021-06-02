<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class);
    }

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
        
        $currentuser = Auth::user()->getKey();
        //return $query->where('active', 1);
    }
}
