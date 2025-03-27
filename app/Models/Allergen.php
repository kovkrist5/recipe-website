<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Allergen extends Model
{
   
    public $timestamps= false;
    public $table= 'allergens';
    protected $fillable=['algid', "allergenName"];
}
