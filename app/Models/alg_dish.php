<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class alg_dish extends Model
{
    
        public function algdish(){
            return $this->belongsToMany(Dish::class, Allergen::class);
            
        }
        public $timestamps= false;
        public $table= 'alg_dish';
        protected $fillable=['dishid', "alg"];
        //protected $casts=["id"=> "array"];
    
}
