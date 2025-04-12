<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Allergen extends Model
{
    public function algdish(){
        return $this->hasMany(alg_dish::class);
    }
    public $timestamps= false;
    public $table= 'allergens';
    protected $fillable=['id', "allergenName"];
}
