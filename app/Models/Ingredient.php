<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    public function dishes(){
        return $this->belongsTo(Dish::class);
        
    }
    public $timestamps= false;
    public $table= 'ingredients';

    protected $casts = [
        'ing'=>'array',
    ];
}
