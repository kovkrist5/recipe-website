<?php

namespace Database\Seeders;

use App\Models\Dish;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Dishes=[
            [
                "name"=>"Cherry pie",
                "courseId"=>"6",
                "desc"=>"(from 'tastesbetterfromscratch' by Lauren Allen) Homemade cherry pie is such an easy pie recipe and works great with fresh or canned cherries, so you can enjoy cherry pie all year round! ",
                
                "inst"=>"idk im lazy to copy it;me when im a placeholder",
                "prep"=>20,
                "cooktime"=>45,
            ],
        ];
        foreach($Dishes as $d){
            Dish::create($d);
    }
}
}