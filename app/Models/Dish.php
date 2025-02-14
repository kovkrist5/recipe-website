<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    public function course(){
        return $this->belongsTo(Course::class);
        
    }
    public function ings(){
        return $this->hasMany(Ingredient::class, "dishid");
    }
    public $table= 'dishes';
    protected $fillable=["courseId", "name","desc","prep","cooktime"];
}
