<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Allergen extends Model
{
    public function allergen(){
        return $this->belongsTo(AlgDish::class);
    }
    public $timestamps= false;
    public $table= 'allergens';
    protected $fillable=['id', "allergenName"];
}
