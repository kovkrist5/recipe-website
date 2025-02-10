<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function dishes(){
        return $this->hasMany(Dish::class);
    }
    public $timestamps= false;
    public $table= 'courses';
    protected $fillable=['id', "courseName"];

}
