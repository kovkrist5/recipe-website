<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Allergen;
use \Illuminate\Support\Facades\DB;

class AllergenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('allergens')->insert([
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
                
            ],
           
        ]);
        
    }
}
