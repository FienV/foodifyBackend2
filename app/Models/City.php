<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    public function user() {
        return $this->hasMany(User::class);
    }

    public function restaurant() {
        return $this->hasMany(Restaurant::class);
    }

    public function order() {
        return $this->hasMany(Order::class);
    }
}
