<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IngSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //"1.5 pound of cherries;3/4 cup granulated sugar;2 Tablespoons lemon juice;1/3 cup cornstarch;2 Tablespoons butter;1/2 teaspoon ground cinnamon;homemade pie crust;1 large egg white , beaten",
        $ings=[
            [
                "dishid"=>1,
                "ing"=>"cherry"
            ],
            [
                "dishid"=>1,
                "ing"=>"sugar"
            ],
        ];
        foreach ($ings as $i){
            Ingredient::create($i);
        }
    }
}
