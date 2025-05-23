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
                "name"=>"peanut butter sandwitch",
                "courseId"=>"8",
                "desc"=>"yummy pbj suitable for every meal",
                "img"=>"pbj.jpg",
                "inst"=>array("take 2 slices of bread"," put peanut butter on one"," put a jam of your choice on the other"," slap em togeter","enjoy!"),
                "ing"=>array("bread","peanut butter","jelly",),
                "prep"=>5,
                "cooktime"=>null,
            ],
            [
                "name"=>"garlic bread",
                "courseId"=>"1",
                "desc"=>"yummy garlic bread great with pasta",
                "img"=>"garlicbread.jpg",
                "inst"=>array("take a baguette and cut into it","slather it with garlic butter","top it with the cheese of your choice","cook it in the oven for 10 minutes"),
                "ing"=>array("baguette","garlic butter","cheese"),
                "prep"=>5,
                "cooktime"=>10,
            ],
        ];
        foreach($Dishes as $d){
            Dish::create($d);
    }
}
}
