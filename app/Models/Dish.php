<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    public function course(){
        return $this->belongsTo(Course::class, "courseId");

    }
    /*public function ings(){
        return $this->hasMany(Ingredient::class, "dishid");
    }*/
    public function allergens(){
        return $this->belongsToMany(Allergen::class,"alg_dish","dishid","alg");
    }
    public $table= 'dishes';
    protected $casts=[
        'ing'=>'array',

        "inst"=>"array"
    ];
    protected $fillable=["courseId", "name","desc","ing", "inst","img","prep","cooktime"];
}
