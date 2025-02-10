<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    public function dish(){
        return $this->belongsToMany(Course::class, AlgDish::class);
    }
    public $table= 'dishes';
    protected $fillable=["courseId", "name","desc","ing","prep","cooktime"];
}
