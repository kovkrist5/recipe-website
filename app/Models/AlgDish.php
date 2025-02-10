<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlgDish extends Model
{
    public function algdish(){
        return $this->hasMany(Dish::class, Allergen::class);
    }
}