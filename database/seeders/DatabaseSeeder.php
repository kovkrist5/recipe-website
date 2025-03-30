<?php

namespace Database\Seeders;

use App\Models\alg_dish;
use App\Models\Allergen;

use App\Models\Course;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       
        $Allergens=[
            [
                "id"=>"1",
                "allergenName"=> "Gluten",
            ],
            [
                "id"=>"2",
                "allergenName"=> "Crustaceans",
            ],
            [
                "id"=>"3",
                "allergenName"=> "Egg",
            ],
            [
                "id"=>"4",
                "allergenName"=> "Fish",
            ],
            [
                "id"=>"5",
                "allergenName"=> "Peanut",
            ],
            [
                "id"=>"6",
                "allergenName"=> "Soy",
            ],
            [
                "id"=>"7",
                "allergenName"=> "Milk",
            ],
            [
                "id"=>"8",
                "allergenName"=> "Treenuts",
            ],
            [
                "id"=>"9",
                "allergenName"=> "Celery",
            ],
            [
                "id"=>"10",
                "allergenName"=> "Mustard",
            ],
            [
                "id"=>"11",
                "allergenName"=> "Sesame",
            ],
            [
                "id"=>"12",
                "allergenName"=> "Sulphur dioxide",
                
            ],
            [
                "id"=>"13",
                "allergenName"=> "Lupin",
                
            ],
            [
                "id"=>"14",
                "allergenName"=> "Molluscs",
                
            ]
        ];
        foreach($Allergens as $a){
            Allergen::create($a);
        }
        $Courses = ['appetizer', 'soup', 'main dish', 'side dish', 'salad', 'dessert','pastry', 'other'];
        foreach ($Courses as $c){
            Course::create(['courseName'=> $c]);
        }


        $this->call([
            DishSeeder::class, AlgDishSeeder::class
        ]);
    }
}
